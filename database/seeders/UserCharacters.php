<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\DB;

    class UserCharacters extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            DB::table('user_characters')->insert([
                [
                    'user_id' => 1,
                    'user_image_id' => 1,
                    'name' => 'SchnetzMeister',
                    'bio' => 'Servant, Father, Nerd. I love roleplaying games, board games, video games, and building things! I am one of the developers of this app and it has been a super fun project.',
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 10,
                    'user_image_id' => 3,
                    'name' => 'KSchnetz',
                    'bio' => 'I love D&D and creating homebrew content.',
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        }
    }
