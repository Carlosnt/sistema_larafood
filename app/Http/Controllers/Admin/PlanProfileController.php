<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfilePermissionController extends Controller
{
    public function permissions($profile_id)
    {
        $profile = Profile::with('permissions')->find($profile_id);

        if(!$profile){
            return redirect()->back();
        }

        $permissions = $profile->permissions;

        return view('layouts.admin.profiles.permissions.index', [
            'profile' => $profile,
            'permissions' => $permissions
        ]);
    }

    public function profiles($permission_id)
    {
        $permission = Permission::find($permission_id);

        if(!$permission){
            return redirect()->back();
        }

        $profiles = $permission->profiles()->get();

        return view('layouts.admin.permissions.profiles.profiles', [
            'profiles' => $profiles,
            'permission' => $permission
        ]);
    }

    public function permissionsAvailable(Request $request, $profile)
    {
        $profile = Profile::where('id',$profile)->first();
        $filters = $request->except('_token');

        if(!$profile){
            return redirect()->back();
        }

        $permissions = $profile->permissionsAvailable($request->filter);
        return view('layouts.admin.profiles.permissions.available', [
            'profile' => $profile,
            'permissions' => $permissions,
            'filters' => $filters
        ]);
    }

    public function attachPermissionsProfile(Request $request, $profile)
    {
        $profile = Profile::where('id',$profile)->first();
        if(!$profile){
            return redirect()->back();
        }

        $data = (object) $request->all();
        if(!isset($data->permissions) || count($data->permissions) == 0){
            $json['message'] = $this->message->warning("Selecione pelo menos uma permissão para fazer a vinculação")->render();
            $json['reload'] = true;
            return response()->json($json);
        }else{
            $profile->permissions()->attach($data->permissions);
            $json['message'] = $this->message->success("Permissões adicionadas com sucesso")->render();
            $json['redirect'] = route('profiles.permissions',$profile->id);
            return response()->json($json);
        }

    }

    public function detachPermissionsProfile($profile, $permission)
    {
        $profile = Profile::find($profile);
        $permission = Permission::find($permission);

        if(!$profile || !$permission){
            $json['message'] = $this->message->warning("Oppps! Perfil ou permissão não encontrado!")->render();
            $json['redirect'] = route('profiles.permissions', $profile->id);
            return response()->json($json);

        }else{
            $profile->permissions()->detach($permission);
            $json['message'] = $this->message->success("Permissão do perfil {$profile->name} deletado com sucesso!")->render();
            $json['redirect'] = route('profiles.permissions',$profile->id);
            return response()->json($json);
        }
    }
}
