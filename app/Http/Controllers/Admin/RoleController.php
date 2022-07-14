<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('layouts.admin.roles.index', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $createRoles = Role::create($request->all());
        if ($createRoles) {
            $json['message'] = $this->message->success("Permissão cadastrada com sucesso")->render();
            $json['redirect'] = route('admin.roles.index');
            return response()->json($json);
        } else {
            $json['message'] = $this->message->error("Erro ao cadastrar a permissão")->render();
            $json['redirect'] = route('admin.roles.create');
            return response()->json($json);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::where('id', $id)->first();
        return response()->json($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('id', $id)->first();
        return view('layouts.admin.roles.edit', [
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $RolesUpdate = Role::where("id", $id)->first();

        $RolesUpdate->fill($request->all());

        if (!$RolesUpdate->save()) {
            $json['message'] = $this->message->warning("Erro ao atualizado o cargo")->render();
            return response()->json($json);
        } else {
            $json['message'] = $this->message->success("Cargo com sucesso")->render();
            return response()->json($json);
        }
    }


    /**
     * Search filter
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $roles = Role::where(function ($query) use ($request){
            if($request->filter){
                $query->where('name', $request->filter)
                      ->orWhere('description', 'LIKE', "%{$request->filter}%");
            }
        })->get();

        return view('layouts.admin.roles.index', [
            'roles' => $roles
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Role::where('id', $id)->first();
        if ($deleted->delete()) {
            $json['message'] = $this->message->success("Cargo deletado com sucesso")->render();
            $json['redirect'] = route('admin.roles.index');
            return response()->json($json);
        } else {
            $json['message'] = $this->message->error("Oppps! Erro ao deletar o cargo")->render();
            $json['redirect'] = route('admin.roles.index');
            return response()->json($json);
        }
    }
}
