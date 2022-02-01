<?php

	namespace App\Http\Livewire;

    use App\Models\User as UserModel;

    class UserPosts extends Feed {
        public string $user_name;

        public function Mount() {
            $user = UserModel::whereHas('Character', function($query) {
                $query->where('name', $this->user_name);
            })->first();
            if (empty($user)) {
                abort(404);
            }
            $this->user_id = $user->id;
            $this->pagination_count = config('app.settings.post_pagination', 20);
            $this->allow_toggling_post_status = $this->user_id === auth()->user()->id;
            array_push($this->filters, 'Author: ' . $user->Character->name);
            $this->show_drafts = true;
        }
	}
