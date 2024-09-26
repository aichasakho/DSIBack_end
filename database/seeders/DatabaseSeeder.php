<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'nom' => 'ADMIN',
            'prenom' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'nom' => 'Sakho',
            'prenom' => 'Mouhamed',
            'email' => 'first@gmail.com',
            'password' => bcrypt('first'),
            'role' => 'proprietaire',
            'ninea' => '123456789',
            'adresse' => 'Adresse 1',
            'tel' => '123456789',
            'registreDeCommerce' => '00002313113',
        ]);

        \App\Models\User::factory()->create([
            'nom' => 'Soukouna',
            'prenom' => 'Djibril',
            'email' => 'deux@gmail.com',
            'password' => bcrypt('first'),
            'role' => 'proprietaire',
            'ninea' => '123456709',
            'adresse' => 'Adresse 2',
            'tel' => '123456959',
            'registreDeCommerce' => '00002313913',
        ]);

        \App\Models\User::factory()->create([
            'nom' => 'Samassa',
            'prenom' => 'Boubou',
            'email' => 'trois@gmail.com',
            'password' => bcrypt('first'),
            'role' => 'proprietaire',
            'ninea' => '123453780',
            'adresse' => 'Adresse 3',
            'tel' => '123450789',
            'registreDeCommerce' => '00002343113',
        ]);

      \App\Models\User::factory()->create([
        'nom' => 'Skn',
        'prenom' => 'chekhne',
        'email' => 'quatre@gmail.com',
        'password' => bcrypt('first'),
        'role' => 'proprietaire',
        'ninea' => '123451459',
        'adresse' => 'Adresse 4',
        'tel' => '123450909',
        'registreDeCommerce' => '00002093113',
      ]);

      \App\Models\User::factory()->create([
        'nom' => 'Aicha',
        'prenom' => 'Mama',
        'email' => 'cinq@gmail.com',
        'password' => bcrypt('first'),
        'role' => 'proprietaire',
        'ninea' => '123454538',
        'adresse' => 'Adresse 5',
        'tel' => '123450679',
        'registreDeCommerce' => '0000234413',
      ]);

      \App\Models\User::factory()->create([
        'nom' => 'sylla',
        'prenom' => 'Ali',
        'email' => 'six@gmail.com',
        'password' => bcrypt('first'),
        'role' => 'proprietaire',
        'ninea' => '12345349',
        'adresse' => 'Adresse 6',
        'tel' => '123450809',
        'registreDeCommerce' => '000023888',
      ]);

      \App\Models\User::factory()->create([
        'nom' => 'Sow',
        'prenom' => 'Fatou',
        'email' => 'sept@gmail.com',
        'password' => bcrypt('first'),
        'role' => 'proprietaire',
        'ninea' => '12345589',
        'adresse' => 'Adresse 7',
        'tel' => '123450459',
        'registreDeCommerce' => '00004713113',
      ]);

      \App\Models\User::factory()->create([
        'nom' => 'LY',
        'prenom' => 'Omar',
        'email' => 'huit@gmail.com',
        'password' => bcrypt('first'),
        'role' => 'proprietaire',
        'ninea' => '123458789',
        'adresse' => 'Adresse 8',
        'tel' => '12345889',
        'registreDeCommerce' => '00002888113',
      ]);




      \App\Models\User::factory(10)->create();

        $this->call([
            TypeBienSeeder::class,
            LocaliteSeeder::class,
            BienImmobilierSeeder::class,
            AppartementSeeder::class,
            AnnonceSeeder::class,

        ]);
    }
}
