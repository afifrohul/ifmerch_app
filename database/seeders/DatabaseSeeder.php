<?php

namespace Database\Seeders;



use App\Models\User;
use App\Models\Product;
use App\Models\Feedback;
use App\Models\Info;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Afif Rohul',
            'username' => 'afifrohul',
            'email' => 'afifmemyself22@gmail.com',
            'password' => bcrypt('12345678')
        ]);


        Product::factory(20)->create();

        Feedback::factory(4)->create();

        Info::factory(4)->create();

    }
}
