<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DemoDatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 30 companies
        Company::factory()->count(30)->create()->each(function ($company) {
            // create between 1-8 clients for each company
            Client::factory()->count(rand(1,8))->create([
                'company_id' => $company->id
            ]);
        });

        // Extra clients without company
        Client::factory()->count(10)->create();
    }
}
