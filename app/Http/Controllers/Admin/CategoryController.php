<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('layouts.admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $categoryCreated = Category::create($request->all());

        if ($categoryCreated) {
            $categoryCreated->setSlug();
            $json['message'] = $this->message->success("Categoria cadastrado com sucesso")->render();
            $json['redirect'] = route('admin.categories.index');
            return response()->json($json);
        } else {
            $json['message'] = $this->message->error("Erro ao cadastrar a categoria")->render();
            $json['redirect'] = route('admin.categories.create');
            return response()->json($json);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category = Category::find($category->id);

        if(empty($category)){
            return redirect()->back();
        }

        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        if(empty($category)){
            return redirect()->back();
        }

        return view('layouts.admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $categoryUpdate = Category::where("id", $id)->first();

        if(empty($categoryUpdate)){
            return redirect()->back();
        }

        $categoryUpdate->fill($request->all());
        $categoryUpdate->setSlug();
        if (!$categoryUpdate->save()) {
            $json['message'] = $this->message->warning("Erro ao atualizado a categoria")->render();
            return response()->json($json);
        } else {
            $json['message'] = $this->message->success("Categoria atualizada com sucesso")->render();
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
        $deleted = Category::where('id', $id)->first();

        if(empty($deleted)){
            return redirect()->back();
        }

        if ($deleted->delete()) {
            $json['message'] = $this->message->success("Categoria deletada com sucesso")->render();
            $json['redirect'] = route('admin.categories.index');
            return response()->json($json);
        } else {
            $json['message'] = $this->message->error("Oppps! Erro ao deletar o plano")->render();
            $json['redirect'] = route('admin.plans.index');
            return response()->json($json);
        }
    }
}
