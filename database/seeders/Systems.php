<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\DB;

    class Systems extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            DB::table('systems')->insert([
                [
                    'name' => 'D&D 5E',
                    'slug' => 'd&d-5e',
                    'description' => 'Fifth edition of Dungeons & Dragons (D&D or DnD), a fantasy tabletop role-playing game (RPG). Released 2014',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'D&D 4E',
                    'slug' => 'd&d-4e',
                    'description' => 'Fourth edition of Dungeons & Dragons (D&D or DnD), a fantasy tabletop role-playing game (RPG). Released 2008',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'D&D 3E',
                    'slug' => 'd&d-3e',
                    'description' => 'Third edition of Dungeons & Dragons (D&D or DnD), a fantasy tabletop role-playing game (RPG). Released 2000',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'AD&D',
                    'slug' => 'ad&d',
                    'description' => 'Advanced Dungeons & Dragons (AD&D), a fantasy tabletop role-playing game (RPG). Released 1989',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'D&D',
                    'slug' => 'd&d',
                    'description' => 'Original Dungeons & Dragons (D&D), a fantasy tabletop role-playing game (RPG). Released 1974',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        }
    }
