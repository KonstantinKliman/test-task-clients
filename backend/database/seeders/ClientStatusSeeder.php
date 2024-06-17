<?php

namespace Database\Seeders;

use App\Models\ClientStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClientStatus::query()->create(['name' => 'Не в работе']);
        ClientStatus::query()->create(['name' => 'В работе']);
        ClientStatus::query()->create(['name' => 'Отказ']);
        ClientStatus::query()->create(['name' => 'Сделка закрыта']);
    }
}
