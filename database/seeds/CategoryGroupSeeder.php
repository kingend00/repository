<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoryGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;
        // DB::table('category_group')->truncate();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('category_group')->insert([
                'title' => $faker->title.rand(),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
