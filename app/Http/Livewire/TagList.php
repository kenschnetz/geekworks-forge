<?php

    namespace App\Http\Livewire;

    use App\Models\Tag as TagModel;
    use Livewire\Component;
    use Illuminate\Database\Eloquent\Collection;
    use Livewire\WithPagination;

    class TagList extends Component {
        use WithPagination;

        public string $search_term = '';
        public int $pagination_count;
        public bool $menu_show_systems = false, $menu_show_categories = false;

        public function Mount() {
            $this->pagination_count = 12;
        }

        public function Render() {
            return view('livewire.tag-list', ['tags' => $this->GetTags()]);
        }

        private function GetTags() {
            return TagModel::where(function($query) {
                $query->where('name', 'LIKE', '%' . $this->search_term . '%')->orWhere('description', 'LIKE', '%' . $this->search_term . '%');
            })->paginate($this->pagination_count);
        }
    }
