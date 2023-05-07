<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            ['name' => 'Company 1', 'email' => 'company1@example.com', 'logo' => 'logo1.jpg', 'website' => 'www.company1.com'],
            ['name' => 'Company 2', 'email' => 'company2@example.com', 'logo' => 'logo2.jpg', 'website' => 'www.company2.com'],
            ['name' => 'Company 3', 'email' => 'company3@example.com', 'logo' => 'logo3.jpg', 'website' => 'www.company3.com'],
            ['name' => 'Company 4', 'email' => 'company4@example.com', 'logo' => 'logo4.jpg', 'website' => 'www.company4.com'],
            ['name' => 'Company 5', 'email' => 'company5@example.com', 'logo' => 'logo5.jpg', 'website' => 'www.company5.com'],
            ['name' => 'Company 6', 'email' => 'company6@example.com', 'logo' => 'logo6.jpg', 'website' => 'www.company6.com'],
            ['name' => 'Company 7', 'email' => 'company7@example.com', 'logo' => 'logo7.jpg', 'website' => 'www.company7.com'],
            ['name' => 'Company 8', 'email' => 'company8@example.com', 'logo' => 'logo8.jpg', 'website' => 'www.company8.com'],
            ['name' => 'Company 9', 'email' => 'company9@example.com', 'logo' => 'logo9.jpg', 'website' => 'www.company9.com'],
            ['name' => 'Company 10', 'email' => 'company10@example.com', 'logo' => 'logo10.jpg', 'website' => 'www.company10.com'],
            // Add more companies here
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}
