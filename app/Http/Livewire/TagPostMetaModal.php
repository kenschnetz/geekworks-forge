<?php

    namespace App\Http\Livewire;

    use App\Models\Tag as TagModel;
    use Illuminate\Support\Str;
    use Illuminate\Validation\Rule;
    use Livewire\WithPagination;

    class TagPostMetaModal extends PostMetaModal {
        use WithPagination;

        public function Mount() {
            $this->ResetNewItem();
            $this->name = 'tag';
            $this->max_allowed_items = 6;
        }

        public function ResetNewItem() {
            $this->new_item = new TagModel;
        }

        public function Render() {
            $tags = TagModel::where('name', 'like', "%{$this->search_term}%")
                ->orWhere('description', 'like', "%{$this->search_term}%")
                ->latest()
                ->paginate($this->pagination_count);
            return view('livewire.post-meta-modal', ['items' => $tags]);
        }
    }
