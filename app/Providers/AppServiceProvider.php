<?php

namespace App\Providers;

use App\Http\Controllers\Api\TenantApiController;
use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use App\Models\Table;
use App\Observers\CategoryObserver;
use App\Observers\ClientObserver;
use App\Observers\TableObserver;
use App\Repositories\Contracts\TenantRepositoryInterface;
use App\Repositories\TenantRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Tenant;
use App\Observers\TenantObserver;
use App\Observers\ProductObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Schema::defaultStringLength(191);

       Category::observe(CategoryObserver::class);
       Client::observe(ClientObserver::class);
       Tenant::observe(TenantObserver::class);
       Table::observe(TableObserver::class);
       Product::observe(ProductObserver::class);

    }
}
