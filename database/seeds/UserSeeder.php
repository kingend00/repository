<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();

        // DB::table('users')->truncate();

        // $limit = 10;

        // for ($i = 0; $i < $limit; $i++) {
        //     DB::table('users')->insert([
        //         'name' => $faker->name,
        //         'email' => $faker->unique()->email,
        //         'phone_number' => rand(),
        //         'password' => bcrypt('12345678'),
        //         'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     ]);
        // }

        DB::table('users')->insert([
            'name' => "Super admintrator",
            'email' => "hoang.nguyen.connectiv@gmail.com",
            'phone_number' => "012345679",
            'password' => bcrypt('12345678'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
