<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Database\Seeder;
use App\Models\Agent;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $system = app(CreatesNewUsers::class)->create(config('kwyc-campaign.seeds.user.system'));
    }
}
