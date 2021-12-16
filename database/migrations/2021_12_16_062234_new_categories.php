<?php

    use App\Models\Category as CategoryModel;
    use Illuminate\Database\Migrations\Migration;

    class NewCategories extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            $location_category = CategoryModel::where('id', 5)->first();
            $location_category->id = 5;
            $location_category->name = "Locations";
            $location_category->slug = "locations";
            $location_category->description = "RPG locations such a dungeon, tavern, cave, etc.";
            $location_category->save();
            $art_category = new CategoryModel;
            $art_category->id = 6;
            $art_category->name = "Art";
            $art_category->slug = "art";
            $art_category->description = "RPG art that may apply to any other category, or any RPG setting";
            $art_category->save();
            $rule_category = new CategoryModel;
            $rule_category->id = 7;
            $rule_category->name = "Rule";
            $rule_category->slug = "rule";
            $rule_category->description = "RPG rule that may alter or override a raw system rule";
            $rule_category->save();
            $misc_category = new CategoryModel;
            $misc_category->id = 8;
            $misc_category->name = "Misc";
            $misc_category->slug = "misc";
            $misc_category->description = "Everything else!";
            $misc_category->save();
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            CategoryModel::where('id', 6)->delete();
            CategoryModel::where('id', 7)->delete();
            CategoryModel::where('id', 8)->delete();
            $misc_category = CategoryModel::where('id', 5)->first();
            $misc_category->name = "Misc";
            $misc_category->slug = "misc";
            $misc_category->description = "Everything else!";
            $misc_category->save();
        }
    }
