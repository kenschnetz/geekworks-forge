<?php

	namespace App\Http\Livewire\Parent;

	use Illuminate\Database\Eloquent\Model;
    use Livewire\Component;

    class EditItem extends Component {
        public int|null $item_id;
        public Model|null $item;
        public string $title, $list_route;

        public function Cancel() {
            $this->BackToList();
        }

        public function Save() {
            $this->validate();
            $this->item->save();
            $this->BackToList();
        }

        private function BackToList() {
            return redirect()->route($this->list_route);
        }
	}
