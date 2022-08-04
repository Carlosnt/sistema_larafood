<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function getProductsByTenantId(int $tenant_id, array $categories);
    public function getProductByFlag(string $flag);
}
