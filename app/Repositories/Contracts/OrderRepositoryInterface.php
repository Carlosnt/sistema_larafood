<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $tenant_id,
        string $comment = null,
        $clientId = null,
        $tableId = null
    );

    public function getOrderByIdentify(string $identify);
    public function registerProductsOrder(int $orderId, array $products);
    public function getOrderByClientId(int $clientId);
    public function getOrdersByTenantId(int $idTenant, string $status, string $date = null);
    public function updateStatusOrder(string $identify, string $status);
}
