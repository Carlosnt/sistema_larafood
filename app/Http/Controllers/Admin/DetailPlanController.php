<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DetailsPlanRequest;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($url)
    {
        $plan = Plan::where('url', $url)->first();
        if(!$plan = Plan::where('url', $url)->first()){
            return redirect()->back();
        }

        $details = $plan->details()->paginate();
        return view('layouts.admin.plans.details.index', [
            'plan' => $plan,
            'details' => $details,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($url)
    {
        $plan = Plan::where('url', $url)->first();
        if(!$plan = Plan::where('url', $url)->first()){
            return redirect()->back();
        }
        return view('layouts.admin..plans.details.create',[
            'plan' => $plan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailsPlanRequest $request, $url)
    {
        $plan = Plan::where('url',$url)->first();
        if(!$plan = Plan::where('url', $url)->first()){
            return redirect()->back();
        }

        $created = $plan->details()->create($request->all());

        if($created){
            $json['message'] = $this->message->success("Detalhes do plano cadastrado com sucesso")->render();
            $json['redirect'] = route('admin.details.plan.index',[$plan->url]);
            return response()->json($json);
        }else{
            $json['message'] = $this->message->warning("Erro ao cadastrar o detalhes do plano")->render();
            $json['reload'] = true;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($url,$id)
    {
        $plan = Plan::where('url', $url)->first();
        if(!$plan = Plan::where('url', $url)->first()){
            return redirect()->back();
        }
        $detail = DetailPlan::where('id',$id)->first();
        return view('layouts.admin..plans.details.edit',[
            'plan' => $plan,
            'detail' => $detail
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\DetailsPlanRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DetailsPlanRequest $request, $url,$id)
    {
        $detailUpdate = DetailPlan::find($id);
        $detailUpdate->fill($request->all());

        if(!$detailUpdate->save()){
            $json['message'] = $this->message->warning("Erro ao atualizado o detalhe do plano")->render();
            return response()->json($json);
        }else{
            $json['message'] = $this->message->success("Detalhe do plano atualizado com sucesso")->render();
            $json['redirect'] = route('admin.details.plan.index',[$url]);
            return response()->json($json);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($url, $id)
    {
        $plan = Plan::where('url', $url)->first();
        $deleted = DetailPlan::where('id', $id)->first();
        if($deleted->plan_id == $plan->id) {
            if ($deleted->delete()) {
                $json['message'] = $this->message->success("Detalhe do plano deletado com sucesso")->render();
                $json["redirect"] = route('admin.details.plan.index',$plan->url);
                return response()->json($json);
            } else {
                $json['message'] = $this->message->error("Oppps! Erro ao deletar o plano")->render();
                $json["reload"] = true;
                return response()->json($json);
            }
        }else{
            $json['message'] = $this->message->error("Oppps! Você tentou deltar um detalhe que não pertence a esse plano")->render();
            $json['reload'] = true;
            }
        }

}
