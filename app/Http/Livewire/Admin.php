<?php

    namespace App\Http\Livewire;

    use App\Utilities\Admin as AdminUtilities;
    use Livewire\Component;
    use Illuminate\Support\Collection;

    class Admin extends Component {
        public Collection $tools;

        public function Mount() {
            $this->tools = AdminUtilities::Tools();
        }

        public function Render() {
            return view('livewire.admin');
        }
    }
