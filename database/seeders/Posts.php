<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\DB;

    class Posts extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            DB::table('posts')->insert([
                [
                    'post_type_id' => 1,
                    'user_id' => 1,
                    'post_id' => null,
                    'system_id' => 2,
                    'category_id' => 2,
                    'slug' => 'forthin-ring-of-damaging',
                    'published' => true,
                    'moderated' => false,
                    'allow_conversions' => true,
                    'is_art_only' => false,
                    'locked_art' => false,
                    'locked_canon' => false,
                    'is_conversion' => false,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
            DB::table('post_details')->insert([
                [
                    'post_id' => 1,
                    'version' => 1,
                    'active' => true,
                    'title' => 'Forthin - Ring Of Spell Damage',
                    'description' => 'A ring that provides additional damage to spells',
                    'content' => '<div>Forged in the depths of an active volcano, Forthin gives spellcasters the ability to strike their foes with additional damage multiple times per long rest.</div>',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
            DB::table('post_tags')->insert([
                [
                    'tag_id' => 12,
                    'post_taggable_id' => 1,
                    'post_taggable_type' => 'App\Models\PostDetail',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'tag_id' => 14,
                    'post_taggable_id' => 1,
                    'post_taggable_type' => 'App\Models\PostDetail',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'tag_id' => 15,
                    'post_taggable_id' => 1,
                    'post_taggable_type' => 'App\Models\PostDetail',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'tag_id' => 22,
                    'post_taggable_id' => 1,
                    'post_taggable_type' => 'App\Models\PostDetail',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'tag_id' => 7,
                    'post_taggable_id' => 2,
                    'post_taggable_type' => 'App\Models\PostDetail',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'tag_id' => 9,
                    'post_taggable_id' => 2,
                    'post_taggable_type' => 'App\Models\PostDetail',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'tag_id' => 29,
                    'post_taggable_id' => 2,
                    'post_taggable_type' => 'App\Models\PostDetail',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
            DB::table('post_attributes')->insert([
                [
                    'attribute_id' => 4,
                    'post_attributable_id' => 1,
                    'post_attributable_type' => 'App\Models\PostDetail',
                    'value' => '+1d4 (2) to any spell damage roll',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'attribute_id' => 6,
                    'post_attributable_id' => 1,
                    'post_attributable_type' => 'App\Models\PostDetail',
                    'value' => '3 per long rest',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'attribute_id' => 7,
                    'post_attributable_id' => 1,
                    'post_attributable_type' => 'App\Models\PostDetail',
                    'value' => 'Required',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        }
    }
