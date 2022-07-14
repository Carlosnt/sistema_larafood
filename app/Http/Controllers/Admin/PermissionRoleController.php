<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    public function permissions($role_id)
    {
        $role = Role::with('permissions')->find($role_id);

        if(!$role){
            return redirect()->back();
        }

        $permissions = $role->permissions()->get();

        return view('layouts.admin.roles.permissions.index', [
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    public function roles($permission_id)
    {
        $permission = Permission::find($permission_id);

        if(!$permission){
            return redirect()->back();
        }

        $roles = $permission->roles()->get();

        return view('layouts.admin.roles.permissions.index', [
            'roles' => $roles,
            'permission' => $permission
        ]);
    }

    public function permissionsAvailable(Request $request, $role)
    {
        $role = Role::where('id',$role)->first();
        $filters = $request->except('_token');

        if(!$role){
            return redirect()->back();
        }

        $permissions = $role->permissionsAvailable($request->filter);
        return view('layouts.admin.roles.permissions.available', [
            'role' => $role,
            'permissions' => $permissions,
            'filters' => $filters
        ]);
    }

    public function attachPermissionsRole(Request $request, $role)
    {
        $role = Role::where('id',$role)->first();
        if(!$role){
            return redirect()->back();
        }

        $data = (object) $request->all();
        if(!isset($data->permissions) || count($data->permissions) == 0){
            $json['message'] = $this->message->warning("Selecione pelo menos uma permissão para fazer a vinculação")->render();
            $json['reload'] = true;
            return response()->json($json);
        }else{
            $role->permissions()->attach($data->permissions);
            $json['message'] = $this->message->success("Permissões adicionadas com sucesso")->render();
            $json['redirect'] = route('admin.roles.permissions',$role->id);
            return response()->json($json);
        }

    }

    public function detachPermissionsRole($role, $permission)
    {
        $role = Role::find($role);
        $permission = Permission::find($permission);

        if(!$role || !$permission){
            $json['message'] = $this->message->warning("Oppps! Perfil ou permissão não encontrado!")->render();
            $json['redirect'] = route('admin.roles.permissions', $role->id);
            return response()->json($json);

        }else{
            $role->permissions()->detach($permission);
            $json['message'] = $this->message->success("Permissão do do cargo {$role->name} deletado com sucesso!")->render();
            $json['redirect'] = route('admin.roles.permissions',$role->id);
            return response()->json($json);
        }
    }
}
