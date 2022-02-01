<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\DB;

    class SkillLevels extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            DB::table('skill_levels')->insert([
                [
                    'name' => 'Novice',
                    'description' => 'Imperceptible',
                    'points_required' => 0,
                ],
                [
                    'name' => 'Initiate',
                    'description' => 'Slight',
                    'points_required' => 20,
                ],
                [
                    'name' => 'Apprentice',
                    'description' => 'Mediocre',
                    'points_required' => 50,
                ],
                [
                    'name' => 'Journeyman',
                    'description' => 'Average',
                    'points_required' => 150,
                ],
                [
                    'name' => 'Expert',
                    'description' => 'Above average',
                    'points_required' => 600,
                ],
                [
                    'name' => 'Master',
                    'description' => 'High',
                    'points_required' => 3000,
                ],
                [
                    'name' => 'Artisan',
                    'description' => 'Legendary',
                    'points_required' => 18000,
                ],
            ]);
        }
    }
