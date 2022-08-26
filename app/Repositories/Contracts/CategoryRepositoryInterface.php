<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function getCategoryByTenantUuid(string $uuid);
    public function getCategoryByTenantId(int $tenant_id);
    public function getCategoryByUuid(string $uuid);
}
