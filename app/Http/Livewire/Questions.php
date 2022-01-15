<?php

    namespace App\Http\Livewire;

    class Questions extends Feed {
        public function Mount() {
            $this->pagination_count = config('app.settings.post_pagination', 20);
            $this->post_type_id = 2;
            array_push($this->filters, 'Questions');
        }
    }
