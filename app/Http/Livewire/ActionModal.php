<?php

    namespace App\Http\Livewire;

    use App\Models\Action as ActionModel;
    use Livewire\WithPagination;

    class ActionModal extends Modal {
        use WithPagination;

        public function Mount() {
            // TODO: streamline as much of this as possible
            $this->ResetNewItem();
            $this->title = 'Manage Actions';
            $this->modal_name = 'action-modal';
            $selected_actions = $this->post_details->Actions()->get();
            foreach($selected_actions as $selected_action) {
                $action = [
                    'id' => $selected_action->Action->id,
                    'name' => $selected_action->Action->name,
                    'description' => $selected_action->Action->description,
                    'value' => $selected_action->value,
                ];
                $this->selected_items[$action['id']] = $action;
            }
            $this->max_allowed_items = 6;
            $this->model = 'App\Models\PostAction';
            $this->item_id_key = 'action_id';
            $this->polymorphic_id_key = 'post_actionable_id';
            $this->polymorphic_type_key =  'post_actionable_type';
            $this->polymorphic_type_value =  'App\Models\PostDetail';
            $this->collection = 'actions';
        }

        public function ResetNewItem() {
            $this->new_item = new ActionModel;
        }

        public function Render() {
            $actions = ActionModel::where('name', 'like', "%{$this->search_term}%")
                ->orWhere('description', 'like', "%{$this->search_term}%")
                ->latest()
                ->paginate($this->pagination_count);
            return view('livewire.item-management-modal', ['items' => $actions]);
        }
    }
