<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Support\Cropper;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('layouts.admin.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $tenant = auth()->user()->tenant;
        if(!empty($request->file('image') && $request->image->isValid())){
            $data['image'] = $request->file('image')->storeAs("tenants/{$tenant->uuid}/products", Str::slug($request->title)  . '-' . str_replace('.', '', microtime(true)) . '.' . $request->file('image')->extension());
        }

        $productCreated = Product::create($data);

        if ($productCreated) {
            $json['message'] = $this->message->success("Produto cadastrado com sucesso")->render();
            $json['redirect'] = route('admin.products.index');
            return response()->json($json);
        } else {
            $json['message'] = $this->message->error("Erro ao cadastrar o produto")->render();
            $json['redirect'] = route('admin.products.create');
            return response()->json($json);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = Product::find($product->id);

        if(empty($product)){
            return redirect()->back();
        }

        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        if(empty($product)){
            return redirect()->back();
        }

        return view('layouts.admin.products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $productUpdate = Product::where("id", $id)->first();

        if(empty($productUpdate)){
            return redirect()->back();
        }

        $tenant = auth()->user()->tenant;

        if(!empty($request->hasFile('image'))){
            Storage::delete($productUpdate->image);
            Cropper::flush($productUpdate->image);
            $productUpdate->image = '';
            $productUpdate->image = $request->file('image')->storeAs("tenants/{$tenant->uuid}/products", Str::slug($request->title)  . '-' . str_replace('.', '', microtime(true)) . '.' . $request->file('image')->extension());
            $productUpdate->save();
        }

        $productUpdate->fill($request->all());

        unset($productUpdate->image);

        if(!$productUpdate->save()) {
            $json['message'] = $this->message->warning("Erro ao atualizar o produto")->render();
            return response()->json($json);
        } else {
            $json['message'] = $this->message->success("Produto atualizado com sucesso")->render();
            return response()->json($json);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Product::where('id', $id)->first();

        if(empty($deleted)){
            return redirect()->back();
        }

        if ($deleted->delete()) {
            Storage::delete($deleted->image);
            Cropper::flush($deleted->image);
            $json['message'] = $this->message->success("Produto deletado com sucesso")->render();
            $json['redirect'] = route('admin.products.index');
            return response()->json($json);
        } else {
            $json['message'] = $this->message->error("Oppps! Erro ao deletar o produto")->render();
            $json['redirect'] = route('admin.products.index');
            return response()->json($json);
        }
    }
}
