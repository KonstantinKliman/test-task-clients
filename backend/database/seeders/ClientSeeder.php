<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 4; $i++) {
            Client::query()->create([
                'user_id' => 1,
                'first_name' => 'Имя',
                'middle_name' => 'Отчество',
                'last_name' => 'Фамилия',
                'date_of_birth' => '2000-01-01',
                'inn' => '123456789123',
                'status_id' => fake()->numberBetween(1,4),
            ]);
        };
    }
}
