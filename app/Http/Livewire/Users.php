<?php

    namespace App\Http\Livewire;

    use App\Http\Livewire\Parent\ItemList;
    use App\Models\User as UserModel;

    class Users extends ItemList {
        public string $sort_field = 'users.name', $item_icon = 'fa-user',  $item_name = 'User', $route = 'admin-user';

        public function Render() {
            $items = $this->GetItems();
            $columns = $this->GetColumns();
            return view('components.admin-tools.list', ['items' => $items, 'columns' => $columns]);
        }

        private function GetItems() {
            return UserModel::join('user_characters', 'user_characters.user_id', '=', 'users.id')
                ->select('users.*', 'user_characters.name AS display_name')
                ->where(function($query) {
                    $query->where('users.name', 'like', "%{$this->search_term}%")->orWhere('user_characters.name', 'like', "%{$this->search_term}%");
                })
                ->orderBy($this->sort_field, $this->sort_direction)
                ->paginate($this->pagination_count);
        }

        private function GetColumns() {
            return collect([
                (object)['name' => 'Name', 'sort_by' => 'name', 'sortable' => true, 'key' => 'name'],
                (object)['name' => 'Display Name', 'sort_by' => 'user_characters.name', 'sortable' => true, 'key' => 'display_name'],
                (object)['name' => 'Joined Date', 'sort_by' => 'created_at', 'sortable' => true, 'key' => 'created_at'],
            ]);
        }
    }
