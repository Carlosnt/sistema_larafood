<?php

namespace App\Http\Controllers\Api;

use App\Events\OrderCreate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Api\OrderRequest;
use App\Http\Requests\Admin\Api\TenantFormRequest;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use http\Env\Response;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(OrderRequest $request)
    {
        $order = $this->orderService->createNewOrder($request->all());

        broadcast(new OrderCreate($order));

        return new OrderResource($order);
    }

    public function show($identify)
    {
        if(!$order = $this->orderService->getOrderByIdentify($identify)){
            return response()->json(['message' => "Not Found", 404]);
        }

        return new OrderResource($order);
    }

    public function myOrders()
    {
        $orders = $this->orderService->orderByClient();
        return OrderResource::collection($orders);
    }
}
