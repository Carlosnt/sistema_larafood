<?php

namespace App\Services;

use App\Http\Resources\TenantResource;
use App\Models\Plan;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoryService
{

    private $categoryRepository;
    private $tenantRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        TenantRepositoryInterface $tenantRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function getCategoriesByUuid(string $uuid)
    {
        $tenant =  $this->tenantRepository->getTenantByUuid($uuid);

        return $this->categoryRepository->getCategoryByTenantId($tenant->id);
    }

    public function getCategoryByIdentify(string $uuid)
    {
        return $this->categoryRepository->getCategoryByUuid($uuid);
    }


}
