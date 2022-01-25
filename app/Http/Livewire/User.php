<?php

    namespace App\Http\Livewire;

    use App\Models\User as UserModel;
    use App\Http\Livewire\Parent\EditItem;

    class User extends EditItem {

        public function Mount() {
            if (empty($this->item_id)) {
                $item = new UserModel;
                $title = 'New User';
            } else {
                $item = UserModel::where('id', $this->item_id)->first();
                $title = 'Edit User';
            }
            $this->item = $item;
            $this->title = $title;
            $this->list_route = 'admin-users';
        }

        public function Render() {
            return view('livewire.user');
        }

        protected function Rules() {
            return [
                'item.name' => 'required|string',
                'item.email' => 'required|string',
            ];
        }
    }
