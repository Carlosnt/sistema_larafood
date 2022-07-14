<?php

namespace App\Service;

use App\Models\Plan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TenantService
{
    private $plan;
    private $data = [];

    public function make($plan, $data)
    {
        $this->plan = $plan;
        $this->data = $data;

        $tenant = $this->createTenant();
        $user = $this->storeUser($tenant);

        return $user;
    }

    public function createTenant(arra $data)
    {
        $data = $this->data;
        return $this->plan->tenants()->create([
            'document' => $data['document'],
            'company' => $data['company'],
            'email' => $data['email'],
            'url' => Str::slug($data['company']),
            'subscription' => now(),
            'expired_at' => now()->addDays(7)
            ]);
    }

    public function storeUser($tenant)
    {
        $user = $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => Hash::make($this->data['password'])
        ]);

        return $user;
    }

}
