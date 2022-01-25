<?php

    namespace App\Http\Livewire;

    use App\Http\Livewire\Parent\ItemList;
    use App\Models\User as UserModel;

    class UserViolations extends ItemList {
        public string $sort_field = 'users.name', $item_icon = 'fa-user-alt-slash',  $item_name = 'User Violation', $route = 'admin-user-violation';

        public function Render() {
            $items = $this->GetItems();
            $columns = $this->GetColumns();
            return view('components.admin-tools.list', ['items' => $items, 'columns' => $columns]);
        }

        private function GetItems() {
            return UserModel::join('user_characters', 'user_characters.user_id', '=', 'users.id')
                ->join('user_violations', 'user_violations.user_id', '=', 'users.id')
                ->select('users.*', 'user_characters.name AS display_name', 'user_violations.created_at AS violation_at', 'user_violations.reason AS reason')
                ->where(function($query) {
                    $query->where('users.name', 'like', "%{$this->search_term}%")->orWhere('user_characters.name', 'like', "%{$this->search_term}%");
                })
                ->orderBy($this->sort_field, $this->sort_direction)
                ->paginate($this->pagination_count);
        }

        private function GetColumns() {
            return collect([
                (object)['name' => 'Name', 'sort_by' => 'name', 'sortable' => true, 'key' => 'name'],
                (object)['name' => 'Display Name', 'sort_by' => 'display_name', 'sortable' => true, 'key' => 'display_name'],
                (object)['name' => 'Reason', 'sort_by' => 'reason', 'sortable' => true, 'key' => 'reason', 'limit_word_count' => 20],
                (object)['name' => 'Violation Date', 'sort_by' => 'violation_at', 'sortable' => true, 'key' => 'violation_at'],
            ]);
        }
    }
