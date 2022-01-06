<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class PostTypes extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            DB::table('post_types')->insert([
                [
                    'name' => 'Idea',
                    'description' => 'Inspiration for various elements of a role playing game such as story hooks, creatures, gear, and more'
                ],
                [
                    'name' => 'Question',
                    'description' => 'Problems or requests relating to planning, game mastering, or playing role playing games'
                ],
                [
                    'name' => 'Article',
                    'description' => 'Blog posts that convey concepts, information and other topics related to role playing games'
                ],
            ]);
        }
    }
