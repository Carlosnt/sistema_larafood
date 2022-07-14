<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('layouts.admin.permissions.index', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $createPermission = Permission::create($request->all());
        if ($createPermission) {
            $json['message'] = $this->message->success("Permissão cadastrado com sucesso")->render();
            $json['redirect'] = route('admin.permissions.index');
            return response()->json($json);
        } else {
            $json['message'] = $this->message->error("Erro ao cadastrar a permissão")->render();
            $json['redirect'] = route('admin.permissions.create');
            return response()->json($json);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::where('id', $id)->first();
        return view('layouts.admin.permissions.show', [
            'permission' => $permission
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::where('id', $id)->first();
        return view('layouts.admin.permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $permissionUpdate = Permission::where("id", $id)->first();

        $permissionUpdate->fill($request->all());

        if (!$permissionUpdate->save()) {
            $json['message'] = $this->message->warning("Erro ao atualizado o permissão")->render();
            return response()->json($json);
        } else {
            $json['message'] = $this->message->success("Permissão atualziada com sucesso")->render();
            return response()->json($json);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $deleted = Permission::where('id', $id)->first();
        if ($deleted->delete()) {
            $json['message'] = $this->message->success("Permissão deletado com sucesso")->render();
            $json['redirect'] = route('admin.permissions.index');
            return response()->json($json);
        } else {
            $json['message'] = $this->message->error("Oppps! Erro ao deletar a permissão")->render();
            $json['redirect'] = route('admin.permissions.index');
            return response()->json($json);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
