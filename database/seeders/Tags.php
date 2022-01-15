<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\DB;

    class Tags extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            DB::table('tags')->insert([
                [
                    'name' => 'Ranger',
                    'slug' =>  'ranger',
                    'description' => 'D&D 5E Ranger Class',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Archery',
                    'slug' =>  'archery',
                    'description' => 'Ranged combat, related to archery equipment',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Ability',
                    'slug' =>  'ability',
                    'description' => 'A character ability that can be used once per turn',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Arrow',
                    'slug' =>  'arrow',
                    'description' => 'A ranged missile, fire from a bow or other archery equipment',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Class',
                    'slug' =>  'class',
                    'description' => 'Character class',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Campaign',
                    'slug' =>  'campaign',
                    'description' => 'Represents a complete RPG campaign from start to finish',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Adventure',
                    'slug' =>  'adventure',
                    'description' => 'Represents a piece of a campaign',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Session',
                    'slug' =>  'session',
                    'description' => 'Represents a single session, or meeting',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Story Arc',
                    'slug' =>  'story-arc',
                    'description' => 'Continuing or complete storyline',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'D&D 5E',
                    'slug' =>  'd&d-5e',
                    'description' => '5th edition of the Dungeons & Dragons RPG',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Druid',
                    'slug' =>  'druid',
                    'description' => 'For the Druid Class',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Ring',
                    'slug' =>  'ring',
                    'description' => 'Something you wear on your finger.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Bauble',
                    'slug' =>  'bauble',
                    'description' => 'A small, showy trinket or decoration.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Equipment',
                    'slug' =>  'equipment',
                    'description' => 'Anything that you carry that isn\'t primarily a weapon.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Magic',
                    'slug' =>  'magic',
                    'description' => 'Has magical properties.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Weapon',
                    'slug' =>  'weapon',
                    'description' => 'This item is designed for combat.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Ranged',
                    'slug' =>  'ranged',
                    'description' => 'This item is designed to be used at range.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Dual Purpose',
                    'slug' =>  'dual-purpose',
                    'description' => 'This item can be used in melee or at range.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Creature',
                    'slug' =>  'creature',
                    'description' => 'A living animal that doesn\'t necessarily mean a monster.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Legend/Mythos',
                    'slug' =>  'legend-mythos',
                    'description' => 'What is the history behind the creature/monster?',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Story Related',
                    'slug' =>  'story-related',
                    'description' => 'This item or creature is directly related to a specific story hook.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Wizard',
                    'slug' =>  'wizard',
                    'description' => 'Player Class',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Potion',
                    'slug' =>  'potion',
                    'description' => 'A liquid concoction.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Consumable ',
                    'slug' =>  'consumable',
                    'description' => 'Something that gets depleted when used.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Modern Tech',
                    'slug' =>  'modern-tech',
                    'description' => 'Abilites that are for more modern items like guns and rifles, especially for artificers.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Cursed',
                    'slug' =>  'cursed',
                    'description' => 'It has some form of negative magical effect.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Item',
                    'slug' =>  'item',
                    'description' => 'An item that does not fall into any more specific category',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Melee',
                    'slug' =>  'melee',
                    'description' => 'Melee',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'World Building',
                    'slug' =>  'world-building',
                    'description' => 'Fantasy homebrew world building elements',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        }
    }
