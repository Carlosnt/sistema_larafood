<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('layouts.admin.profiles.index', [
            'profiles' => $profiles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        $createProfile = Profile::create($request->all());
        if ($createProfile) {
            $json['message'] = $this->message->success("Perfil cadastrado com sucesso")->render();
            $json['redirect'] = route('admin.profiles.index');
            return response()->json($json);
        } else {
            $json['message'] = $this->message->error("Erro ao cadastrar o perfil")->render();
            $json['redirect'] = route('admin.profiles.create');
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
        $profile = Profile::where('id', $id)->first();
        return response()->json($profile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::where('id', $id)->first();
        return view('layouts.admin.profiles.edit', [
            'profile' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $profileUpdate = Profile::where("id", $id)->first();

        $profileUpdate->fill($request->all());

        if (!$profileUpdate->save()) {
            $json['message'] = $this->message->warning("Erro ao atualizado o perfil")->render();
            return response()->json($json);
        } else {
            $json['message'] = $this->message->success("Plano perfil com sucesso")->render();
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
        $deleted = Profile::where('id', $id)->first();
        if ($deleted->delete()) {
            $json['message'] = $this->message->success("Perfil deletado com sucesso")->render();
            $json['redirect'] = route('admin.profiles.index');
            return response()->json($json);
        } else {
            $json['message'] = $this->message->error("Oppps! Erro ao deletar o perfil")->render();
            $json['redirect'] = route('admin.profiles.index');
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
        $profiles = Profile::where(function ($query) use ($request){
            if($request->filter){
                $query->where('name', $request->filter)
                      ->orWhere('description', 'LIKE', "%{$request->filter}%");
            }
        })->get();

        return view('layouts.admin.profiles.index', [
            'profiles' => $profiles
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
        //
    }
}
