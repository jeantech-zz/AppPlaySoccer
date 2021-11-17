<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(GroupSeeder::class);
        $this->call(TeamSeeder::class);
      //  $this->call(PlayerSeeder::class);
        
    }
}
