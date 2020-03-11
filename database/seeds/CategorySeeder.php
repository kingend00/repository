<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategorySeeder extends Seeder
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
        Schema::disableForeignKeyConstraints();

        for ($i = 0; $i < $limit; $i++) {
            DB::table('category')->insert([
                'title' => $faker->title.rand(),
                'category_group_id' => $i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
