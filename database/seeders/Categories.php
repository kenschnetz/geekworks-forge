<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\DB;

    class Categories extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            DB::table('categories')->insert([
                [
                    'name' => 'None',
                    'slug' => 'none',
                    'description' => 'No category applies',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Gear',
                    'slug' => 'gear',
                    'description' => 'Items such as weapons, armor, tools, etc.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Creatures',
                    'slug' => 'creatures',
                    'description' => 'Any living thing not intended for use as a player character',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Hooks',
                    'slug' => 'hooks',
                    'description' => 'RPG story hooks for crafting encounters, sessions, campaigns and more',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Abilities',
                    'slug' => 'abilities',
                    'description' => 'Homebrew abilities and actions to enhance RPG characters',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Locations',
                    'slug' => 'locations',
                    'description' => 'Maps, cities, caves, dungeons, or any other location that can be used in an RPG setting',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Mysteries',
                    'slug' => 'mysteries',
                    'description' => 'Strange happenings that can be fit into any story arc',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Characters',
                    'slug' => 'characters',
                    'description' => 'Ready made characters for RPG players to adopt',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Races',
                    'slug' => 'races',
                    'description' => 'Group of creatures or beings that can be used either by the game master or players in character creation',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Classes',
                    'slug' => 'classes',
                    'description' => 'New ways to define how a character can be played',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Rules',
                    'slug' => 'rules',
                    'description' => 'Homebrew rules that can replace or augment raw system rule sets',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Misc',
                    'slug' => 'misc',
                    'description' => 'Anything that does not fit into the other categories',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        }
    }
