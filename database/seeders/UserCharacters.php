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
                    'bio' => 'Servant, Father, Nerd',
                    'skill' => 0,
                    'reputation' => 0,
                    'level' => 1,
                    'experience' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        }
    }
