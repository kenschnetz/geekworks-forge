<?php

    namespace App\Http\Livewire;

    use App\Http\Livewire\Parent\ItemList;
    use App\Models\Ticket as TicketModel;

    class Tickets extends ItemList {
        public string $sort_field = 'subject', $item_icon = 'fa-hand-holding-medical',  $item_name = 'Ticket', $route = 'ticket';

        public function Render() {
            $items = $this->GetItems();
            $columns = $this->GetColumns();
            return view('components.admin-tools.list', ['items' => $items, 'columns' => $columns]);
        }

        private function GetItems() {
            return TicketModel::when(!auth()->user()->IsStaff() && !auth()->user()->IsAdmin(), function($query) {
                    $query->where('user_id', auth()->user()->id);
                })->latest()
                ->orderBy($this->sort_field, $this->sort_direction)
                ->paginate($this->pagination_count);
        }

        private function GetColumns() {
            return collect([
                (object)['name' => 'Subject', 'sort_by' => 'subject', 'sortable' => true, 'key' => 'subject'],
            ]);
        }
    }
