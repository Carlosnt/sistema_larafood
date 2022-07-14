<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    public function profiles($plan_id)
    {
        $plan = Plan::find($plan_id);

        if(!$plan){
            return redirect()->back();
        }

        $profiles = $plan->profiles()->get();

        return view('layouts.admin.plans.profiles.index', [
            'plan' => $plan,
            'profiles' => $profiles
        ]);
    }

    public function plans($profile_id)
    {
        $profile = Profile::find($profile_id);

        if(!$profile){
            return redirect()->back();
        }

        $plans = $profile->plans()->get();

        return view('layouts.admin.profiles.plans.plans', [
            'profile' => $profile,
            'plans' => $plans
        ]);
    }

    public function profilesAvailable(Request $request, $plan)
    {
        $plan = Plan::where('id',$plan)->first();
        $filters = $request->except('_token');

        if(!$plan){
            return redirect()->back();
        }

        $profiles = $plan->profilesAvailable($request->filter);
        return view('layouts.admin.plans.profiles.available', [
            'plan' => $plan,
            'profiles' => $profiles,
            'filters' => $filters
        ]);
    }

    public function attachProfilesPlan(Request $request, $plan)
    {
        $plan = Plan::where('id',$plan)->first();
        if(!$plan){
            return redirect()->back();
        }

        $data = (object) $request->all();
        if(!isset($data->profiles) || count($data->profiles) == 0){
            $json['message'] = $this->message->warning("Selecione pelo menos um plano para fazer a vinculação")->render();
            $json['reload'] = true;
            return response()->json($json);
        }else{
            $plan->profiles()->attach($data->profiles);
            $json['message'] = $this->message->success("Plano adicionado com sucesso")->render();
            $json['redirect'] = route('admin.plans.profiles',$plan->id);
            return response()->json($json);
        }

    }

    public function detachProfilePlan($plan_id, $profile_id)
    {
        $plan = Plan::find($plan_id);
        $profile = Profile::find($profile_id);

        if(!$plan || !$profile){
            $json['message'] = $this->message->warning("Oppps! Plano ou perfil não encontrado!")->render();
            $json['redirect'] = route('admin.plans.profiles', $plan->id);
            return response()->json($json);

        }else{
            $plan->profiles()->detach($profile);
            $json['message'] = $this->message->success("Perfil do plano {$plan->name} deletado com sucesso!")->render();
            $json['redirect'] = route('admin.plans.profiles',$plan->id);
            return response()->json($json);
        }
    }
}
