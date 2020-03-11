<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TagSeeder extends Seeder
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
        // DB::table('tag')->truncate();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('tag')->insert([
                'name' => $faker->title.rand(),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
