<?php

	namespace App\Http\Livewire;

	use Livewire\Component;

    class Modal extends Component {
        public string|null $name, $search_term = '';
        public bool $show = false;

        protected $listeners = [
            'Show' => 'Show',
            'Close' => 'Close',
        ];

        public function Show() {
            $this->show = true;
        }

        public function Close() {
            $this->show = false;
        }
    }
