<?php

namespace App\Services;

use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TableService
{

    private $table;
    private $tenantRepository;

    public function __construct(
        TableRepositoryInterface $table,
        TenantRepositoryInterface $tenantRepository)
    {
        $this->table = $table;
        $this->tenantRepository = $tenantRepository;
    }

    public function getTablesByUuid(string $uuid)
    {
        $tenant =  $this->tenantRepository->getTenantByUuid($uuid);

        return $this->table->gettablesByTenantId($tenant->id);
    }

    public function getTableByUuid(string $uuid)
    {
        return $this->table->getTableByUuid($uuid);
    }


}
