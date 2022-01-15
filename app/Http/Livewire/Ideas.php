<?php

    namespace App\Http\Livewire;

    class Ideas extends Feed {
        public function Mount() {
            $this->pagination_count = config('app.settings.post_pagination', 20);
            $this->post_type_id = 1;
            array_push($this->filters, 'Ideas');
        }
    }
