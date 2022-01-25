<?php

	namespace App\Http\Livewire\Parent;

    use Livewire\Component;
    use Livewire\WithPagination;

    class ItemList extends Component {
        use WithPagination;
        public string $user_name, $sort_field = '', $sort_direction = 'asc', $search_term = '';
        public int $pagination_count;

        public function Mount() {
            $this->pagination_count = config('app.settings.post_pagination', 20);
        }

        public function SortBy($field) {
            if (!empty($this->sort_field)) {
                if ($this->sort_field === $field) {
                    $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
                } else {
                    $this->sort_direction = 'asc';
                }
                $this->sort_field = $field;
            }
        }
	}
