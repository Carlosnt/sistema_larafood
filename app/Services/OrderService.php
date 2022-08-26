<?php

namespace App\Services;


use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class OrderService
{

    protected $orderRepository;
    protected $tenantRepository;
    protected $tableRepository;
    protected $productRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        TenantRepositoryInterface $tenantRepository,
        TableRepositoryInterface $tableRepository,
        ProductRepositoryInterface $productRepository,
    )
    {
        $this->orderRepository = $orderRepository;
        $this->tenantRepository = $tenantRepository;
        $this->tableRepository = $tableRepository;
        $this->productRepository = $productRepository;
    }

    public function orderByClient()
    {
        $clientId = $this->getClientIdByOrder();

        return $this->orderRepository->getOrderByClientId($clientId);
    }
    public function getOrderByIdentify(string $identify)
    {
        return $this->orderRepository->getOrderByIdentify($identify);
    }

    public function createNewOrder(array $data)
    {
        $productsOrder = $this->getProductsByOrder($data['products'] ?? []);
        $identify = $this->getIdentifyOrder();
        $total = $this->getTotalByIdOrder($productsOrder);
        $status = 'open';
        $tenantId = $this->getTenantByIdOrder($data['token_company']);
        $comment = isset($data['comment']) ? $data['comment'] : null;
        $clientId = $this->getClientIdByOrder();
        $tableId = $this->getTableByIdOrder($data['table'] ?? '');

        $order = $this->orderRepository->createNewOrder(
            $identify,
            $total,
            $status,
            $tenantId,
            $comment,
            $clientId,
            $tableId
        );

        $this->orderRepository->registerProductsOrder($order['id'], $productsOrder);

        return $order;

    }
    private function getIdentifyOrder(int $qtyCaracters = 8)
    {
        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');

        $numbers = (((date('Ymd') / 12 ) * 24) + mt_rand(800,9999));
        $numbers .=1234567890;
        $characters = $smallLetters.$numbers;

        $identify = substr(str_shuffle($characters), 0, $qtyCaracters);

        if($this->orderRepository->getOrderByIdentify($identify)){
            $this->getIdentifyOrder($qtyCaracters + 1);
        }

        return $identify;
    }

    private function getTotalByIdOrder(array $products): float
    {
        $total = 0;
        foreach ($products as $product){
            $total += ($product['price'] * $product['qty']);
        }
        return (float) $total;
    }

    private function getTenantByIdOrder(string $uuid)
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);
        return $tenant->id;
    }

    private function getTableByIdOrder(string $uuid = null)
    {
        if($uuid){
            $table = $this->tableRepository->getTableByUuid($uuid);

            return $table->id;
        }

        return null;
    }

    private function getClientIdByOrder()
    {
        return auth()->check() ? auth()->user()->id : '';
    }

    private function getProductsByOrder(array $productsOrder): array
    {
        $products = [];
        foreach ($productsOrder as $productOrder){
            $product = $this->productRepository->getProductByUuid($productOrder['identify']);
            array_push($products, [
                'id' => $product->id,
                'qty' => $productOrder['qty'],
                'price' => $product->price,
            ]);
        }

        return $products;
    }

}
