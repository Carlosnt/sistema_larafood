<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var string
     */
    protected $table;

    /**
     *
     */
    public function __construct()
    {
        $this->table = 'products';
    }


    /**
     * @param int $tenant_id
     * @return \Illuminate\Support\Collection
     */
    public function getProductsByTenantId(int $tenant_id, array $categories)
    {
        return DB::table($this->table)
            ->join('category_product', 'category_product.product_id', '=', 'products.id')
            ->join('categories', 'category_product.category_id', '=', 'categories.id')
            ->where('products.tenant_id', $tenant_id)
            ->where(function ($query) use ($categories){
                if($categories != []){
                    $query->whereIn('categories.url', $categories);
                }
            })
            ->get();
    }

    public function getProductByFlag(string $flag)
    {
        return DB::table($this->table)
            ->where('flag', $flag)
            ->first();
    }

}