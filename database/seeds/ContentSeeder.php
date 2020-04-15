<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ContentSeeder extends Seeder
{
    function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        $limit = 10;
        Schema::disableForeignKeyConstraints();
        // DB::table('content')->truncate();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < $limit; $i++) {
            DB::table('content')->insert([
                'title' => $faker->title,
                'content' => $faker->paragraph,
                'rate' => 10,
                'rate_count' => 8,
                'category_id' => $i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            
        }


        Schema::enableForeignKeyConstraints();
    }
}
