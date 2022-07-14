<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Support\Cropper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth()->user()->hasPermission('users')) {
            abort(403, 'Unauthorized');
        }

        $users = User::latest()->tenantUser();

        return view('layouts.admin.users.index', [
            'users' => $users
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
        $user = User::tenantUser()->where('id', $id)->first();
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::tenantUser()->find($id);
        return  view('layouts.admin.users.edit', [
            'user'=> $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userUpdate = User::tenantUser()->where("id", $id)->first();

        if(!empty($request->hasFile('image'))){
            Storage::delete($userUpdate->image);
            Cropper::flush($userUpdate->image);
            $userUpdate->image = '';
            $userUpdate->image = $request->file('image')->storeAs("users", Str::slug($request->name)  . '-' . str_replace('.', '', microtime(true)) . '.' . $request->file('image')->extension());
            $userUpdate->save();
        }

        $userUpdate->fill($request->all());

        unset($userUpdate->image);

        if($userUpdate->save()){
            $json['message'] = $this->message->success("Usuário atualizado com sucesso")->render();
            $json['redirect'] = route('admin.users.index');
            return response()->json($json);
        }else{
            $json['message'] = $this->message->error("Erro ao atualizar o usuário")->render();
            $json['redirect'] = route('admin.users.edit',$userUpdate->id);
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
