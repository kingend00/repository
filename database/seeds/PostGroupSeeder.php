<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post_groups = [
            [
                'title' => "Tản mạn",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => "Chuyên mục Dev",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => "Tấu hài",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => "Tech chém gió ",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]
                ];
        Schema::disableForeignKeyConstraints();
        DB::table('post_groups')->truncate();
        foreach($post_groups as $data){
            DB::table('post_groups')->insert(
                $data
            );
        }


        Schema::enableForeignKeyConstraints();

    }
}
