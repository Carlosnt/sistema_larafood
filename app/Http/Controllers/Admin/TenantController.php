<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TenantRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Tenant;
use App\Models\User;
use App\Support\Cropper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth()->user()->hasPermission('tenants')) {
            abort(403, 'Unauthorized');
        }

        $tenants = Tenant::all();

        return view('layouts.admin.tenants.index', [
            'tenants' => $tenants
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();

        $tenant = auth()->user()->tenant;

        $data['tenant_id'] = auth()->user()->tenant_id;

        if(!empty($request->file('image') && $request->image->isValid())){
            $data['image'] = $request->file('image')->storeAs("users", Str::slug($request->name)  . '-' . str_replace('.', '', microtime(true)) . '.' . $request->file('image')->extension());
        }

        $createUser = User::create($data);
        if($createUser){
            $json['message'] = $this->message->success("Usuário cadastrado com sucesso")->render();
            $json['redirect'] = route('admin.users.index');
            return response()->json($json);
        }else{
            $json['message'] = $this->message->error("Erro ao cadastrar o usuário")->render();
            $json['redirect'] = route('admin.users.create');
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
        $tenant = Tenant::with('plan')->where('id', $id)->first();
        return response()->json($tenant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tenant = Tenant::where('id', $id)->first();
        return  view('layouts.admin.tenants.edit', [
            'tenant'=> $tenant
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TenantRequest $request, $id)
    {
        $tenantUpdate = Tenant::where("id", $id)->first();

        if(!empty($request->hasFile('logo') && $request->logo->isValid())) {
            if ($tenantUpdate->logo != null) {
                Storage::delete($tenantUpdate->logo);
                Cropper::flush($tenantUpdate->logo);
            }
            $tenantUpdate->logo = '';
            $tenantUpdate->logo = $request->file('logo')->storeAs("tenants/{$tenantUpdate->uuid}/logo", Str::slug($request->company)  . '-' . str_replace('.', '', microtime(true)) . '.' . $request->file('logo')->extension());
            $tenantUpdate->save();
        }

        $tenantUpdate->fill($request->all());

        unset($tenantUpdate->logo);

        if($tenantUpdate->save()){
            $json['message'] = $this->message->success("Empresa atualizada com sucesso")->render();
            $json['redirect'] = route('admin.tenants.index');
            return response()->json($json);
        }else{
            $json['message'] = $this->message->error("Erro ao atualizar a empresa")->render();
            $json['redirect'] = route('admin.tenants.edit',$tenantUpdate->id);
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
        $deleted = User::tenantUser()->where('id', $id)->first();

        if ($deleted->delete()) {
            $json['message'] = $this->message->success("Usuário deletado com sucesso")->render();
            $json['redirect'] = route('admin.users.index');
            return response()->json($json);
        } else {
            $json['message'] = $this->message->error("Oppps! Erro ao deletar o usuário")->render();
            $json['redirect'] = route('admin.users.index');
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
