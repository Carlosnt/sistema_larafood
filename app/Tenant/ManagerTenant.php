<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManagerTenant
{
    public function getTenantIdentify()
    {
        return auth()->check() ? auth()->user()->tenant_id : "";
    }

    public function tenant()
    {
        return auth()->check() ? auth()->user()->tenant : "";
    }

    public function isAmdin():bool
    {
        return in_array(auth()->user()->email, config('tenant.admins'));
    }
}
