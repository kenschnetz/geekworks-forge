<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\DB;

    class UserImages extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            DB::table('user_images')->insert([
                [
                    'user_id' => 1,
                    'name' => 'headshot 2021',
                    'description' => 'A recent headshot of me',
                    'filename' => 'headshot 2021.jpg',
                    'path' => '/storage/user-images/1/headshot 2021.jpg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 1,
                    'name' => 'Forthin',
                    'description' => 'A cool magical ring',
                    'filename' => 'forthin',
                    'path' => '/storage/user-images/1/PCaciWM6pBKejexoUxDCer9LO70zORDUKcwGy7Xa.jpg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 10,
                    'name' => 'headshot 2020',
                    'description' => 'Headshot',
                    'filename' => 'headshot 2020.jpg',
                    'path' => '/storage/user-images/10/headshot 2020.jpg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        }
    }
