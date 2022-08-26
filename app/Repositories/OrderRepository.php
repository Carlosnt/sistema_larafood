<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;


/**
 *
 */
class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @var string
     */
    protected $entity;

    /**
     *
     */
    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    /**
     * @param string $uuid
     * @return \Illuminate\Support\Collection
     */
    public function createNewOrder(string $identify, float $total, string $status, int $tenant_id, string $comment = null, $clientId = null, $tableId = null)
    {
        $data = [
            'tenant_id' => $tenant_id,
            'identify' => $identify,
            'total' => $total,
            'status' => $status,
            'comment' => $comment,
            ];

       if($clientId) $data['client_id'] = $clientId;
       if($tableId) $data['table_id'] = $tableId;

        $order = $this->entity->create($data);

        return $order;
    }

    /**
     * @param string $identify
     * @return \Illuminate\Support\Collection
     */
    public function getOrderByIdentify(string $identify)
    {
        return $this->entity->where('identify', $identify)->first();
    }

    public function getOrderByClientId(int $clientId)
    {
        $orders = $this->entity->where('client_id', $clientId)->paginate();
        return $orders;
    }

    public function registerProductsOrder(int $orderId, array $products)
    {
        $order = $this->entity->find($orderId);

        $orderProducts = [];
        foreach ($products as $product){
            $orderProducts[$product['id']] = [
                'qty' => $product['qty'],
                'price' => $product['price'],
            ];
        }
        $order->products()->attach($orderProducts);
//        $orderProducts = [];
//        foreach ($products as $product){
//            array_push($orderProducts, [
//               'order_id' =>$orderId,
//               'product_id' =>$product['id'],
//               'qty' =>$product['qty'],
//               'price' =>$product['price'],
//            ]);
//        }
//
//        DB::table('order_product')->insert($orderProducts);
    }

}
