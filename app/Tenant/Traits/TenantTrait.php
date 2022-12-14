<?php

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scope\TenantScope;

trait TenantTrait
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        parent::boot();

        static::observe(TenantObserver::class);
        static::addGlobalScope(new TenantScope);
    }
}
