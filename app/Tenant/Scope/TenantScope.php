<?php

namespace App\Tenant\Scope;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;


class TenantScope implements Scope
{
    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return \Illuminate\Database\Eloquent\Model $model
     */
    public function apply(Builder $builder, Model $model )
    {
        $identify = app(ManagerTenant::class)->getTenantIdentify();
        if($identify) {
            return $builder->where('tenant_id', $identify);
        }
    }
}
