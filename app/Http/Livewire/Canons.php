<?php

    namespace App\Http\Livewire;

    use App\Models\User as UserModel;
    use Livewire\Component;
    use Livewire\WithPagination;

    class Canons extends Component {
        use WithPagination;
        public string $user_name, $sort_field = 'name', $sort_direction = 'asc', $search_term = '';
        public UserModel $user;
        public int $pagination_count;
        public array $filters = [];

        public function Mount() {
            $this->user = UserModel::whereHas('Character', function($query) {
                $query->where('name', $this->user_name);
            })->first();
            if (empty($this->user)) {
                abort(404);
            }
            $this->pagination_count = config('app.settings.post_pagination', 20);
            array_push($this->filters, 'Canons by ' . $this->user_name);
        }

        public function SortBy($field) {
            if ($this->sort_field === $field) {
                $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
            } else {
                $this->sort_direction = 'asc';
            }
            $this->sort_field = $field;
        }

        public function Render() {
            return view('livewire.canons', ['canons' => $this->GetCanons()]);
        }

        private function GetCanons() {
            return UserModel::find($this->user->id)
                ->Canons(function($query) {
                    $query->where('name', 'like', "%{$this->search_term}%")->orWhere('description', 'like', "%{$this->search_term}%");
                })->orderBy($this->sort_field, $this->sort_direction)
                ->paginate($this->pagination_count);
        }
    }
