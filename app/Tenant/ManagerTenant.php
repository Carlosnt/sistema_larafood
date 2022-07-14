<?php

namespace App\Tenant;

use App\Models\Tenant;

class MenagerTenant
{
    public function getTenantIdentify()
    {
        return auth()->user()->tenant_id;
    }

    public function tenant(): Tenant
    {
        return auth()->user()->tenant;
    }

    public function isAmdin():bool
    {
        return in_array(auth()->user()->email, config('tenant.admins'));
    }
}
