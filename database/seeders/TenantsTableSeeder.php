<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();
        $plan->tenants()->create([
            'document' => '69521819000109',
            'company' => 'Sitiweb',
            'email' =>'carlosnt135@hotmail.com',
        ]);
    }
}
