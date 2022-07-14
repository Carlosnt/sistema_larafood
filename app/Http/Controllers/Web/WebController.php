<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Plan;

class WebController extends Controller
{
    public function home()
    {
        $plans = Plan::with('details')->orderBy('price','ASC')->get();
        $head = $this->seo->render(env('APP_NAME') . ' - UpInside Treinamentos',
            'Encontre o imóvel dos seus sonhos na melhor e mais completa imobiliária do Sul da ilha de Florianópolis',
            route('web.home'),
            asset('frontend/assets/images/share.png'));


        return view('layouts.web.home', [
            'head' => $head,
            'plans' => $plans
        ]);
    }

    public function plan($url)
    {
        $plan = Plan::where('url', $url)->first();

        if(!$plan){
            return redirect()->back();
        }

        session()->put('plan',$plan);

        return redirect()->route('web.register');
    }
}
