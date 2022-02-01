<?php

    namespace App\Http\Livewire;

    use App\Models\User as UserModel;
    use App\Http\Livewire\Parent\EditItem;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\Password;
    use Illuminate\Support\Str;
    use Illuminate\Validation\Rule;

    class User extends EditItem {
        public string $password, $password_confirmation;
        public bool $password_reset_sent = false;

        public function Mount() {
            $this->name = 'user';
            if (empty($this->item_id)) {
                $item = new UserModel;
                $item->password = 'test';
                $item->password_confirmation = 'test';
                $title = 'New User';
            } else {
                $item = UserModel::where('id', $this->item_id)->first();
                $title = 'Edit User';
            }
            $this->item = $item;
            $this->title = $title;
            $this->list_route = 'admin-users';
        }

        public function GeneratePassword() {
            $generated_password = Str::random(12);
            $this->password = $generated_password;
            $this->password_confirmation = $generated_password;
        }

        public function SendPasswordReset() {
            $token = Password::getRepository()->create($this->item);
            $this->item->sendPasswordResetNotification($token);
            $this->item->last_password_reset_sent_at = Carbon::now();
            $this->item->save();
            $this->password_reset_sent = true;
        }

        public function Render() {
            return view('livewire.user');
        }

        protected function Rules() {
            return [
                'item.role_id' => 'required|integer',
                'item.name' => 'required|string',
                'item.email' => [
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore($this->item->id)
                ],
                'password' => 'required|string|confirmed',
            ];
        }
    }
