<?php

    namespace App\Http\Livewire;

    use App\Http\Livewire\Parent\ItemList;
    use App\Models\User as UserModel;

    class UserMutes extends ItemList {
        public string $sort_field = 'users.name', $item_icon = 'fa-user-lock', $item_name = 'User Mute', $route = 'admin-user-mute';

        public function Render() {
            $items = $this->GetItems();
            $columns = $this->GetColumns();
            return view('components.admin-tools.list', [
                'items' => $items,
                'columns' => $columns
            ]);
        }

        private function GetItems() {
            return UserModel::join('user_characters', 'user_characters.user_id', '=', 'users.id')
                ->join('user_mutes', 'user_mutes.user_id', '=', 'users.id')
                ->select('users.*', 'user_characters.name AS display_name', 'user_mutes.created_at AS muted_at', 'user_mutes.reason AS reason', 'user_mutes.expires_at AS expires_at')
                ->where(function ($query) {
                    $query->where('users.name', 'like', "%{$this->search_term}%")->orWhere('user_characters.name', 'like', "%{$this->search_term}%");
                })->orderBy($this->sort_field, $this->sort_direction)
                ->paginate($this->pagination_count);
        }

        private function GetColumns() {
            return collect([
                (object)['name' => 'Name', 'sort_by' => 'name', 'sortable' => true, 'key' => 'name'],
                (object)['name' => 'Display Name', 'sort_by' => 'display_name', 'sortable' => true, 'key' => 'display_name'],
                (object)['name' => 'Reason', 'sort_by' => 'reason', 'sortable' => true, 'key' => 'reason', 'limit_word_count' => 20],
                (object)['name' => 'Mute Start Date', 'sort_by' => 'muted_at', 'sortable' => true, 'key' => 'muted_at'],
                (object)['name' => 'Mute End Date', 'sort_by' => 'expires_at', 'sortable' => true, 'key' => 'expires_at'],
            ]);
        }
    }
