<?php

    namespace App\Http\Livewire;

    use App\Http\Livewire\Parent\ItemList;
    use App\Models\Flag as FlagModel;

    class PostTypes extends ItemList {
        public string $sort_field = 'name', $item_icon = 'fa-network-wired', $item_name = 'Post Types', $new_item_route = 'admin-flag';

        public function Render() {
            $items = $this->GetItems();
            $columns = $this->GetColumns();
            return view('components.admin-tools.list', [
                'items' => $items,
                'columns' => $columns
            ]);
        }

        private function GetItems() {
            return FlagModel::orderBy($this->sort_field, $this->sort_direction)
                ->paginate($this->pagination_count);
        }

        private function GetColumns() {
            return collect([
                (object)['name' => 'Reason', 'sort_by' => 'reason', 'sortable' => true, 'route' => 'admin-flag', 'key' => 'reason', 'limit_word_count' => 20],
                (object)['name' => 'Reviewed Date', 'sort_by' => 'reviewed_at', 'sortable' => true, 'route' => 'admin-flag', 'key' => 'reviewed_at'],
                (object)['name' => 'Flag Date', 'sort_by' => 'created_at', 'sortable' => true, 'route' => 'admin-flag', 'key' => 'created_at'],
            ]);
        }
    }
