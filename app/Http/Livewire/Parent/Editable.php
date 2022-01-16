<?php

	namespace App\Http\Livewire\Parent;
    use Illuminate\Database\Eloquent\Model;
    use Livewire\Component;

	class Editable extends Component {
        public string|null $slug;
        public string $list_route;
        public Model $item;
        public int $pagination_count;
        public bool $editing = false;
        public array $rules;

        public function ToggleEditing() {
            $this->editing = !$this->editing;
        }

        public function Cancel() {
            if (empty($this->item->id)) {
                return redirect()->route($this->list_route);
            }
            $this->ToggleEditing();
        }

        public function Save() {
            $this->validate();
            $this->item->save();
            $this->ToggleEditing();
        }

        protected function Rules() {
            return $this->rules;
        }
	}
