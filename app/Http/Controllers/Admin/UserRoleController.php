<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function roles($user_id)
    {
        $user = User::find($user_id);

        if(!$user){
            return redirect()->back();
        }

        $roles = $user->roles()->get();

        return view('layouts.admin.users.roles.index', [
            'roles' => $roles,
            'user' => $user
        ]);
    }

    public function users($user_id)
    {
        $role = Role::find($user_id);

        if(!$role){
            return redirect()->back();
        }

        $users = $role->users()->get();

        return view('layouts.admin.roles.users.index', [
            'users' => $users,
            'role' => $role
        ]);
    }

    public function rolesAvailable(Request $request, $user)
    {
        $user = User::where('id',$user)->first();
        $filters = $request->except('_token');

        if(!$user){
            return redirect()->back();
        }

        $roles = $user->rolesAvailable($request->filter);
        return view('layouts.admin.users.roles.available', [
            'user' => $user,
            'roles' => $roles,
            'filters' => $filters
        ]);
    }

    public function attachRoleUser(Request $request, $user_id)
    {
        $user = User::where('id', $user_id)->first();
        if(!$user){
            return redirect()->back();
        }

        $data = (object) $request->all();
        if(!isset($data->roles) || count($data->roles) == 0){
            $json['message'] = $this->message->warning("Selecione pelo menos um cargo para fazer a vinculação")->render();
            $json['reload'] = true;
            return response()->json($json);
        }else{
            $user->roles()->attach($data->roles);
            $json['message'] = $this->message->success("Cargo adicionadas com sucesso")->render();
            $json['redirect'] = route('admin.users.roles',$user->id);
            return response()->json($json);
        }

    }

    public function detachRoleUser($user_id, $role_id)
    {
        $user = User::find($user_id);
        $role = Role::find($role_id);

        if(!$user || !$role){
            $json['message'] = $this->message->warning("Oppps! Usuário ou cargo não encontrado!")->render();
            $json['redirect'] = route('admin.users.roles', $user->id);
            return response()->json($json);

        }else{
            $user->roles()->detach($role);
            $json['message'] = $this->message->success("Cargo do usuário {$user->name} deletado com sucesso!")->render();
            $json['redirect'] = route('admin.users.roles',$user->id);
            return response()->json($json);
        }
    }
}
