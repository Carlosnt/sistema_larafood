<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tenant = auth()->user()->tenant;

        $orders = Order::where("created_at",'getdate()')
                        ->where('tenant_id', $tenant->id)
                        ->count();
        $users = User::where('tenant_id', $tenant->id)->count();
        $tables = Table::count();
        $categories = Category::count();
        $profiles = Profile::count();
        $companies = Profile::count();
        $products = Product::count();
        $plans = Plan::count();
        $clients = Client::count();
        return view('layouts.admin.home',[
                'orders' => $orders,
                'users' => $users,
                'tables' => $tables,
                'categories' => $categories,
                'profiles' => $profiles,
                'companies' => $companies,
                'products' => $products,
                'plans' => $plans,
                'clients' => $clients,
            ]);
    }
}
