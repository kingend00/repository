<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentSeeder extends Seeder
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
        Schema::disableForeignKeyConstraints();
        // DB::table('comment')->truncate();

        $limit = 5;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('comment')->insert([
                'content' => $this->generateRandomString(),
                'user_id' => $i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for ($i = 0; $i < $limit; $i++) {
            DB::table('comment')->insert([
                'content' => $this->generateRandomString(),
                'user_id' => $i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for ($i = 0; $i < $limit; $i++) {
            DB::table('comment')->insert([
                'content' => $this->generateRandomString(),
                'user_id' => $i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for ($i = 0; $i < $limit; $i++) {
            DB::table('comment')->insert([
                'content' => $this->generateRandomString(),
                'user_id' => $i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for ($i = 0; $i < $limit; $i++) {
            DB::table('comment')->insert([
                'content' => $this->generateRandomString(),
                'user_id' => $i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
