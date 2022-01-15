<?php

    namespace App\Http\Livewire;

    use App\Models\Category as CategoryModel;

    class CategoryPosts extends Feed {
        public string $category_slug;

        public function Mount() {
            $category = CategoryModel::where('slug', $this->category_slug)->first();
            if (empty($category)) {
                abort(404);
            }
            $this->category_id = $category->id;
            $this->pagination_count = config('app.settings.post_pagination', 20);
            array_push($this->filters, 'Category: ' . $category->name);
            $this->menu_show_categories = true;
        }
    }
