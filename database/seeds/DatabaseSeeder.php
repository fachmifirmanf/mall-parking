<?php

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
        // $this->call(UserSeeder::class);
         $users = [];
        $faker = Faker\Factory::create();        for($i=0;$i<15;$i++){        $data[$i] = [
                'name' => $faker->name,
                // 'email' => $faker->unique()->safeEmail,
                'username' => $faker->unique()->userName,
                // 'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ];
        }        DB::table('users')->insert($data);
    }
}
