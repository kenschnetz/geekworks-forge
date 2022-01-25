<?php

    namespace App\Http\Livewire;

    use App\Http\Livewire\Parent\ItemList;
    use App\Models\System as SystemModel;

    class Systems extends ItemList {
        public string $sort_field = 'name', $item_icon = 'fa-solar-system', $item_name = 'System', $route = 'admin-system';

        public function Render() {
            $items = $this->GetItems();
            $columns = $this->GetColumns();
            return view('components.admin-tools.list', [
                'items' => $items,
                'columns' => $columns
            ]);
        }

        private function GetItems() {
            return SystemModel::orderBy($this->sort_field, $this->sort_direction)
                ->where(function($query) {
                    $query->where('name', 'like', "%{$this->search_term}%")->orWhere('description', 'like', "%{$this->search_term}%");
                })
                ->paginate($this->pagination_count);
        }

        private function GetColumns() {
            return collect([
                (object)['name' => 'Name', 'sort_by' => 'name', 'sortable' => true, 'key' => 'name'],
                (object)['name' => 'Description', 'sort_by' => 'description', 'sortable' => true, 'key' => 'description', 'limit_word_count' => 20],
            ]);
        }
    }
