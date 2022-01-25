<?php

	namespace App\Http\Livewire\Parent;
    use App\Utilities\Misc;
    use Illuminate\Database\Eloquent\Model;
    use Livewire\Component;

	class Editable extends Component {
        public string|null $slug;
        public string $list_route;
        public Model|null $item;
        public int $pagination_count;
        public bool $editing = false;
        public array $rules;
        public string $model;

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
            $this->item->slug = Misc::Slug($this->item->name, $this->model, false);
            $this->item->save();
            $this->ToggleEditing();
        }

        protected function Rules() {
            return $this->rules;
        }
	}
