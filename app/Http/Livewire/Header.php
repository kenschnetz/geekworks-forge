<?php

    namespace App\Http\Livewire;

    use App\Models\User as UserModel;
    use Illuminate\Support\Facades\Auth;
    use Livewire\Component;

    class Header extends Component {

        public string $profile_image_path;
        public UserModel $user;
        public int $notifications;

        protected $listeners = ['MessengerNotificationsRead' => 'GetMessengerNotifications'];

        public function Mount() {
            $this->user = Auth::user();
            $this->profile_image_path = empty($this->user->Character->ProfilePhoto->path) ? '/storage/img/default-profile.jpg' : $this->user->Character->ProfilePhoto->path;
            $this->GetMessengerNotifications();
        }

        public function GetMessengerNotifications() {
            $this->notifications = $this->user->MessengerNotifications();
        }

        public function Render() {
            return view('livewire.header');
        }
    }
