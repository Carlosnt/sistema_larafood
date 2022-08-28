<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TableRequest;
use App\Models\table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();
        return view('layouts.admin.tables.index', [
            'tables' => $tables
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableRequest $request)
    {
        $tableCreated = table::create($request->all());

        if ($tableCreated) {
            $json['message'] = $this->message->success("Mesa cadastrado com sucesso")->render();
            $json['redirect'] = route('admin.tables.index');
            return response()->json($json);
        } else {
            $json['message'] = $this->message->error("Erro ao cadastrar a mesa")->render();
            $json['redirect'] = route('admin.tables.create');
            return response()->json($json);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        $table = Table::find($table->id);

        if(empty($table)){
            return redirect()->back();
        }

        return response()->json($table);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function qrcode($identify)
    {
        $table = Table::where('identify', $identify)->first();

        if(empty($table)){
            return redirect()->back();
        }

        $tenant = auth()->user()->tenant;

        $uri = env('URI_CLIENT')."/{$tenant->uuid}/{$table->uuid}";

        return view('layouts.admin.tables.qrcode',[
            'uri' => $uri
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = Table::find($id);

        if(empty($table)){
            return redirect()->back();
        }

        return view('layouts.admin.tables.edit', [
            'table' => $table
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TableRequest $request, $id)
    {
        $tableUpdate = Table::where("id", $id)->first();

        if(empty($tableUpdate)){
            return redirect()->back();
        }

        $tableUpdate->fill($request->all());
        if (!$tableUpdate->save()) {
            $json['message'] = $this->message->warning("Erro ao atualizado a mesa")->render();
            return response()->json($json);
        } else {
            $json['message'] = $this->message->success("Mesa atualizada com sucesso")->render();
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
        $deleted = Table::where('id', $id)->first();

        if(empty($deleted)){
            return redirect()->back();
        }

        if ($deleted->delete()) {
            $json['message'] = $this->message->success("Mesa deletada com sucesso")->render();
            $json['redirect'] = route('admin.tables.index');
            return response()->json($json);
        } else {
            $json['message'] = $this->message->error("Oppps! Erro ao deletar a mesa")->render();
            $json['redirect'] = route('admin.tables.index');
            return response()->json($json);
        }
    }
}
