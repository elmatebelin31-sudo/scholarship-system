<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Scholarship;

class ScholarshipSeeder extends Seeder
{
    public function run(): void
    {
        Scholarship::create([
            'name' => 'Academic Excellence Scholarship',
            'description' => 'Awarded to outstanding academic performers.',
            'amount' => 20000,
        ]);

        Scholarship::create([
            'name' => 'Financial Assistance Scholarship',
            'description' => 'For students needing financial help.',
            'amount' => 15000,
        ]);

        Scholarship::create([
            'name' => 'STEM Scholars Grant',
            'description' => 'For students enrolled in Science, Tech, Engineering, or Math.',
            'amount' => 25000,
        ]);
    }
}
