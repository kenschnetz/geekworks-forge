<?php

    namespace App\Http\Livewire;

    use Livewire\Component;

    class Ticket extends Component {

        public function MailTo() {
            return 'mailto:contact@geekworksstudios.com' . http_build_query([], encoding_type: PHP_QUERY_RFC3986);
        }

        public function Render() {
            return view('livewire.ticket');
        }
    }
