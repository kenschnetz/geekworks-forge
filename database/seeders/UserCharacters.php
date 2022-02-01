<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Foundation\Inspiring;
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
                    'name' => 'Ken',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 2,
                    'name' => 'Chris',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 3,
                    'name' => 'Jason',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 4,
                    'name' => 'Cassie Greutman',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 5,
                    'name' => 'Steven',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 6,
                    'name' => 'Samuel Irvin',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 7,
                    'name' => 'Josh Dycus',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 8,
                    'name' => 'Luke Hill',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 9,
                    'name' => 'James Marzullo',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 10,
                    'name' => 'Devon Thurgood',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 11,
                    'name' => 'Kenneth Schnetz',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 12,
                    'name' => 'Jeff Lopez',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 13,
                    'name' => 'Michael Neal',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 14,
                    'name' => 'Jason Young',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 15,
                    'name' => 'Jordan Moulton',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 16,
                    'name' => 'Anthony Langley',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 17,
                    'name' => 'Hrafnkell Karlsson',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 18,
                    'name' => 'Cory Hinch',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 19,
                    'name' => 'Brandon Findlay',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 20,
                    'name' => 'Brad Sampson',
                    'bio' => Inspiring::quote(),
                    'level' => 1,
                    'experience_points' => 0,
                    'skill_points' => 0,
                    'reputation_points' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_id' => 21,
                    'name' => 'Hannah Amos',
                    'bio' => Inspiring::quote(),
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
