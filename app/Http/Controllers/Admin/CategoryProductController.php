<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories($product_id)
    {
        $product = Product::find($product_id);

        $categories = $product->categories()->get();

        return view('layouts.admin.products.categories.index', [
            'categories' => $categories,
            'product' => $product,
        ]);
    }

    public function categoriesAvailable(Request $request, $product_id)
    {
        $product = Product::where('id',$product_id)->first();

        if(!$product){
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $categories = $product->categoriesAvailable($request->filter);
        return view('layouts.admin.products.categories.available', [
            'product' => $product,
            'categories' => $categories,
            'filters' => $filters
        ]);
    }

    public function attachCategoriesProduct(Request $request, $product_id)
    {
        $product = Product::where('id',$product_id)->first();
        if(!$product){
            return redirect()->back();
        }

        $data = (object) $request->all();
        if(!isset($data->categories) || count($data->categories) == 0){
            $json['message'] = $this->message->warning("Selecione pelo menos uma categoria para fazer a vinculação")->render();
            $json['reload'] = true;
            return response()->json($json);
        }else{
            $product->categories()->attach($data->categories);
            $json['message'] = $this->message->success("Categoria(s) adicionada(s) com sucesso")->render();
            $json['redirect'] = route('admin.products.categories',$product->id);
            return response()->json($json);
        }
    }

    public function detachCategoriesProduct($product_id, $category_id)
    {
        $product = Product::find($product_id);
        $category = Category::find($category_id);

        if(!$product || !$category){
            $json['message'] = $this->message->warning("Oppps! Produto ou categoria não encontrado!")->render();
            $json['redirect'] = route('admin.products.categories', $product->id);
            return response()->json($json);

        }else{
            $product->categories()->detach($category);
            $json['message'] = $this->message->success("Categoria do produto {$product->name} deletado com sucesso!")->render();
            $json['redirect'] = route('admin.products.categories',$product->id);
            return response()->json($json);
        }
    }

}
