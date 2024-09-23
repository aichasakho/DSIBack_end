<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    \App\Models\User::factory()->create(
      [
        'role' => 'Admin',
      ],
    );

    \App\Models\User::factory()->create(
      [
        'role' => 'Client',
      ],
    );
    \App\Models\User::factory()->create(
      [
        'role' => 'Prorietaire',
      ],
    );




  }
}

