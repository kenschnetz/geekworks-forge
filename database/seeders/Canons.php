<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class Canons extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            DB::table('canons')->insert([
                [
                    'user_id' => 1,
                    'name' => 'Tilandra',
                    'slug' => 'tilandra',
                    'description' => 'Millenia ago, all the major deities disappeared. But something is stirring... are the entities coming back? Or is the one responsible for their disappearance worming it\'s way back? Only time will tell',
                ],
            ]);
            DB::table('canon_posts')->insert([
                [
                    'user_id' => 1,
                    'canon_id' => 1,
                    'post_id' => 1,
                    'approved' => true,
                ],
            ]);
        }
    }
