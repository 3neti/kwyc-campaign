<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campaign;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campaign = Campaign::create([
            'name' => 'Test Campaign',
            'mobile' => '09178251991',
            'email' => 'devops@joy-nostalg.com',
            'webhook' => null
        ]);
    }
}
