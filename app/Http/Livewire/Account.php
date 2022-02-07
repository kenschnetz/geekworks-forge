<?php

    namespace App\Http\Livewire;

    use App\Models\User as UserModel;
    use Illuminate\Validation\Rule;
    use Livewire\Component;

    class Account extends Component {
        public string|null $notification = null;
        public UserModel $user;
        public string $new_password = '', $new_password_confirmation = '';
        public bool $dark_mode;

        public function Mount() {
            $this->user = UserModel::find(auth()->user()->id);
            $this->dark_mode = auth()->user()->dark_mode;
        }

        public function CloseNotification() {
            $this->reset('notification');
        }

        public function Update() {
            $this->validate();
            $this->user->save();
            return redirect()->route('account', ['notification' => 'Account update successful']);
        }

        public function ChangePassword() {
            $this->validate([
                'new_password' => 'string|required|confirmed|max:30',
            ]);
            $this->user->password = bcrypt($this->new_password);
            $this->user->save();
            return redirect()->route('account', ['notification' => 'Password reset successful']);
        }

        public function ToggleTheme() {
            auth()->user()->dark_mode = $this->dark_mode;
            auth()->user()->save();
            redirect()->route('account');
        }

        public function Render() {
            return view('livewire.account');
        }

        protected function Rules() {
            return [
                'user.name' => 'required|string|max:255',
                'user.email' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('users', 'email')->ignore(optional($this->user)->id)
                ],
            ];
        }
    }
