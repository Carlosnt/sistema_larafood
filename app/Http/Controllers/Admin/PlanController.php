<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('layouts.admin.plans.index',[
            'plans' => $plans
        ]);
    }

    public function create()
    {
        return view('layouts.admin.plans.create');
    }

    public function store(PlanRequest $request)
    {
        $createPlan = Plan::create($request->all());
        if($createPlan){
            $createPlan->setSlug();
            $json['message'] = $this->message->success("Plano cadastrado com sucesso")->render();
            $json['redirect'] = route('admin.plans.index');
            return response()->json($json);
        }else{
            $json['message'] = $this->message->error("Erro ao cadastrar o plano")->render();
            $json['redirect'] = route('admin.plans.create');
            return response()->json($json);
        }

    }

    public function edit(Plan $plan)
    {
        $plan = Plan::find($plan->id);
        return view('layouts.admin.plans.edit',[
            'plan' => $plan
        ]);
    }
    public function show(Plan $plan)
    {
        $plan = Plan::find($plan->id);
        return response()->json($plan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PlanRequest  $request
     *  * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanRequest $request, $id)
    {
        $planUpdate = Plan::where("id", $id)->first();

        $planUpdate->fill($request->all());
        $planUpdate->setSlug();
        if(!$planUpdate->save()){
            $json['message'] = $this->message->warning("Erro ao atualizado o plano")->render();
            return response()->json($json);
        }else{
            $json['message'] = $this->message->success("Plano atualizado com sucesso")->render();
            return response()->json($json);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $deleted = Plan::with('details')->where('id', $id)->first();
        if($deleted->details->count() > 0){
            $json['message'] = $this->message->warning("Oppps! Para deletar uma plano, delete antes os detalhes do mesmo!")->render();
            $json['redirect'] = route('admin.plans.index');
            return response()->json($json);
        }else {
            if ($deleted->delete()) {
                $json['message'] = $this->message->success("Plano deletado com sucesso")->render();
                $json['redirect'] = route('admin.plans.index');
                return response()->json($json);
            } else {
                $json['message'] = $this->message->error("Oppps! Erro ao deletar o plano")->render();
                $json['redirect'] = route('admin.plans.index');
                return response()->json($json);
            }
        }
    }
}
