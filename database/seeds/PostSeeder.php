<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
                [
                    'title'=>'Python cơ bản phần 1',
                    'description' => "Description Python cơ bản phần 1 ",
                    'slug' => 'python-co-ban-phan-1',
                    'content' => 'The word data is the plural of Latin datum, “something given.” In English, 
                        most notably in scientific usage, this plural usage is still common, as in this example: 
                        “Eventually, his data suggest, a tumors … alterations give rise to mutant cells” Janet RaloffBut
                        data is also standard in denoting a singular mass entity (like information ), especially in writing
                        for a more general audience: “Before data is transmitted in bulk around the internet, it is 
                        routinely compressed to reduce redundancy” Richard Dawkins “Goodall … wanted to get as much data 
                        as possible from her animals before she had to leave them” Elizabeth Royte • In our 2005 survey, 
                        66 percent of the Usage Panel accepted the use of data with a singular verb and pronoun in the sentence
                        Once the data is in, we can begin to analyze it. Fully 92 percent accepted the sentence We have very 
                        little data on the efficacy of such programs, the same percentage that accepted the use of data as a 
                        plural noun. (Note that the quantifier very little, like much in the last quotation given above, is not 
                        used with plural nouns such as facts or results. ) The percentages in the 2005 survey represent significant
                            increases over those of our 1988 survey, making it safe to say that singular data has become a standard usage.',
                    'postable_id' => 1,
                    'postable_type' => 'App\Model\PostGroup',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title'=>'Python cơ bản phần 2',
                    'description' => "Description Python cơ bản phần 2 ",
                    'slug' => 'python-co-ban-phan-2',
                    'content' => 'The word data is the plural of Latin datum, “something given.” In English, 
                        most notably in scientific usage, this plural usage is still common, as in this example: 
                        “Eventually, his data suggest, a tumors … alterations give rise to mutant cells” Janet RaloffBut
                            data is also standard in denoting a singular mass entity (like information ), especially in writing
                            for a more general audience: “Before data is transmitted in bulk around the internet, it is 
                            routinely compressed to reduce redundancy” Richard Dawkins “Goodall … wanted to get as much data 
                            as possible from her animals before she had to leave them” Elizabeth Royte • In our 2005 survey, 
                            66 percent of the Usage Panel accepted the use of data with a singular verb and pronoun in the sentence
                            Once the data is in, we can begin to analyze it. Fully 92 percent accepted the sentence We have very 
                            little data on the efficacy of such programs, the same percentage that accepted the use of data as a 
                            plural noun. (Note that the quantifier very little, like much in the last quotation given above, is not 
                            used with plural nouns such as facts or results. ) The percentages in the 2005 survey represent significant
                            increases over those of our 1988 survey, making it safe to say that singular data has become a standard usage.',
                    'postable_id' => 1,
                    'postable_type' => 'App\Model\PostGroup',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]
        ];
        
        Schema::disableForeignKeyConstraints();
        DB::table('posts')->truncate();
        foreach($posts as $data){
            DB::table('posts')->insert(
                $data            
            );
        }

        Schema::enableForeignKeyConstraints();
    }
}
