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
    }

    public function getOrdersByTenantId(int $idTenant, string $status, string $date = null)
    {
        $orders = $this->entity
            ->where('tenant_id', $idTenant)
            ->where(function ($query) use ($status) {
                if ($status != 'all') {
                    return $query->where('status', $status);
                }
            })
            ->where(function ($query) use ($date) {
                if ($date) {
                    return $query->whereDate('created_at', $date);
                }
            })
            ->get();

        return $orders;
    }

    public function updateStatusOrder(string $identify, string $status)
    {
        $this->entity->where('identify', $identify)->update(['status' => $status]);

        return $this->entity->where('identify', $identify)->first();
    }

}
