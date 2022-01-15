<?php

    namespace App\Http\Livewire;

    use App\Models\Tag as TagModel;

    class TagPosts extends Feed {
        public string $tag_slug;

        public function Mount() {
            $tag = TagModel::where('slug', $this->tag_slug)->first();
            if (empty($tag)) {
                abort(404);
            }
            $this->tag_id = $tag->id;
            $this->pagination_count = config('app.settings.post_pagination', 20);
            array_push($this->filters, 'Tag: ' . $tag->name);
        }
    }
