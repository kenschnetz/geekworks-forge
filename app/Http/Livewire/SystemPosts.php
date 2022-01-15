<?php

    namespace App\Http\Livewire;

    use App\Models\System as SystemModel;

    class SystemPosts extends Feed {
        public string $system_slug;

        public function Mount() {
            $system = SystemModel::where('slug', $this->system_slug)->first();
            if (empty($system)) {
                abort(404);
            }
            $this->system_id = $system->id;
            $this->pagination_count = config('app.settings.post_pagination', 20);
            array_push($this->filters, 'System: ' . $system->name);
            $this->menu_show_systems = true;
        }
    }
