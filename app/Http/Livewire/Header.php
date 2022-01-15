<?php

    namespace App\Http\Livewire;

    use App\Models\User as UserModel;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Request;
    use Livewire\Component;

    class Header extends Component {

        public string $profile_image_path;
        public UserModel $user;
        public int $notifications;
        public bool $menu_show_systems = false, $menu_show_categories = false;

        protected $listeners = ['MessengerNotificationsRead' => 'GetMessengerNotifications'];

        public function Mount() {
            $this->user = Auth::user();
            $this->profile_image_path = empty($this->user->Character->ProfilePhoto->path) ? '/storage/img/default-profile.jpg' : $this->user->Character->ProfilePhoto->path;
            $this->GetMessengerNotifications();
            $this->menu_show_systems = !empty(Request::route('system_slug'));
            $this->menu_show_categories = !empty(Request::route('category_slug'));
        }

        public function GetMessengerNotifications() {
            $this->notifications = $this->user->MessengerNotifications();
        }

        public function Render() {
            return view('livewire.header');
        }
    }
