<?php

    namespace App\Http\Livewire;

    use App\Http\Livewire\Parent\ItemList;
    use App\Models\PostCollaboration as PostCollaborationModel;

    class Collaborations extends ItemList {
        public bool $include_type = true, $show_your_requests = false, $show_requests_from_others = false;
        public string $type, $sort_field = 'created_at', $item_icon = 'fa-user', $item_name = 'Collaboration', $route = 'collaboration', $status = 'all';

        public function Render() {
            $items = $this->GetItems();
            $columns = $this->GetColumns();
            return view('livewire.collaborations', ['items' => $items, 'columns' => $columns]);
        }

        private function GetItems() {
            return PostCollaborationModel::where(function($query) {
                $query->where(function($query) {
                    $query->when($this->show_your_requests, function ($query) {
                        return $query->where('user_id', auth()->user()->id);
                    });
                })->orWhere(function($query) {
                    $query->when($this->show_requests_from_others, function ($query) {
                        return $query->whereHas('PostDetails', function ($query) {
                            $query->whereHas('Post', function ($query) {
                                $query->where('user_id', auth()->user()->id);
                            });
                        });
                    });
                });
            })->where(function($query) {
                $query->where(function($query) {
                    $query->when($this->status === 'open', function($query) {
                        return $query->where('status', 'Open');
                    });
                })->orWhere(function($query) {
                    $query->when($this->status === 'closed', function($query) {
                        return $query->where('status', 'Closed');
                    });
                });
            })->join('post_details', 'post_collaborations.post_detail_id', '=', 'post_details.id')
            ->select('post_collaborations.*', 'post_details.title AS title', 'post_collaborations.created_at AS created_at')
            ->latest()
            ->orderBy($this->sort_field, $this->sort_direction)
            ->paginate($this->pagination_count);
        }

        private function GetColumns() {
            return collect([
                (object)['name' => 'Status', 'sort_by' => 'status', 'sortable' => true, 'key' => 'status'],
                (object)['name' => 'Post', 'sort_by' => 'post_collaborations.title', 'sortable' => true, 'key' => 'title'],
                (object)['name' => 'Outcome', 'sort_by' => 'outcome', 'sortable' => true, 'key' => 'outcome'],
            ]);
        }
    }
