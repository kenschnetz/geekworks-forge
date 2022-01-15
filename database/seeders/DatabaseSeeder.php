<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run() {
            $this->call([
                Roles::class,
                Users::class,
                UserImages::class,
                UserCharacters::class,
                Systems::class,
                Categories::class,
                Tags::class,
                Attributes::class,
                Actions::class,
                PostTypes::class,
                Posts::class,
                SkillLevels::class,
            ]);
        }
    }
