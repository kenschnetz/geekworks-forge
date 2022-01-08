<?php

    namespace App\Http\Livewire;

    use App\Models\MessengerThread as MessengerThreadModel;
    use App\Models\MessengerThreadMessage as MessengerThreadMessageModel;
    use App\Models\MessengerThreadNotification;
    use App\Models\MessengerThreadUser;
    use App\Models\User as UserModel;
    use Illuminate\Support\Facades\Log;
    use Livewire\Component;
    use Livewire\WithPagination;

    class Messenger extends Component {
        use WithPagination;

        public string|null $action;
        public int|null $actionable_id;
        public UserModel|null $recipient_user;
        public bool $new_thread = false;
        public UserModel $user;
        public string|null $target_action;
        public int|null $target_id;
        public UserModel|null $target_user;
        public MessengerThreadModel|null $selected_thread;
        public int $pagination_count;
        public int $current_pagination_count = 0;
        public int $total_pagination_count = 0;
        public bool $all_messages_loaded = false;
        public string|null $content = null;

        public function Mount() {
            $this->user = auth()->user();
            $this->pagination_count =  config('app.settings.post_pagination', 20);
            if ($this->action === 'new') {
                if (!empty($this->actionable_id)) {
                    $this->recipient_user = UserModel::find($this->actionable_id);
                    if (empty($this->recipient_user)) {
                        abort(404);
                    } else {
                        $this->selected_thread = new MessengerThreadModel;
                        $this->selected_thread->user_id = $this->user->id;
                        $this->new_thread = true;
                    }
                }
            } else if ($this->action === 'thread') {
                if (!empty($this->actionable_id)) {
                    $this->SelectThread($this->actionable_id);
                    if (empty($this->selected_thread)) {
                        abort(404);
                    }
                }
            } else if (!empty($this->action)) {
                abort(404);
            }
        }

        public function loadMoreMessages() {
            if ($this->current_pagination_count + $this->pagination_count < $this->total_pagination_count) {
                $this->current_pagination_count += $this->pagination_count;
            } else {
                $this->current_pagination_count = $this->total_pagination_count;
                $this->all_messages_loaded = true;
            }
        }

        public function SelectThread($thread_id) {
            $this->reset('current_pagination_count', 'total_pagination_count', 'all_messages_loaded');
            $this->selected_thread = $this->user->MessengerThreads()->find($thread_id);
            if (empty($this->selected_thread)) {
                abort(404);
            } else {
                $this->current_pagination_count = $this->pagination_count;
                $this->total_pagination_count = $this->selected_thread->Messages()->count();
                $thread_notification = $this->selected_thread->Notifications()->where('user_id', $this->user->id)->first();
                if (empty($thread_notification)) {
                    $thread_notification = new MessengerThreadNotification();
                    $thread_notification->messenger_thread_id = $thread_id;
                    $thread_notification->user_id = $this->user->id;
                }
                $thread_notification->count = 0;
                $thread_notification->save();
                $this->emit('MessengerNotificationsRead');
            }
        }

        public function Submit() {
            $this->validate([
                'content' => 'required|string',
            ]);
            if ($this->new_thread) {
                $this->CreateThread();
            }
            $this->current_pagination_count += 1;
            $this->total_pagination_count += 1;
            // TODO: if the message contains the pattern @{user->user_character->name}, the thread is owned by the posting user, the related user is found, and the related user is not already in the thread, add the {user_character->name} to the thread
            $new_message = new MessengerThreadMessageModel();
            $new_message->messenger_thread_id = $this->selected_thread->id;
            $new_message->user_id = $this->user->id;
            $new_message->message = $this->content;
            $new_message->save();
            $this->reset('content');
            if ($this->selected_thread->messages->count() <= 0) {
                $this->selected_thread->refresh();
            }
            $this->CreateNotifications();
            redirect()->route('messenger', ['action' => 'thread', 'actionable_id' => $this->selected_thread->id]);
        }

        public function CreateThread() {
            $this->validate();
            $this->selected_thread->save();
            MessengerThreadUser::create(['user_id' => $this->user->id, 'messenger_thread_id' => $this->selected_thread->id]);
            MessengerThreadUser::create(['user_id' => $this->recipient_user->id, 'messenger_thread_id' => $this->selected_thread->id]);
        }

        public function CreateNotifications() {
            foreach($this->selected_thread->Users()->where('users.id', '!=', $this->user->id)->get() as $thread_user) {
                Log::debug(json_encode($thread_user));
                $notification = MessengerThreadNotification::where('messenger_thread_id', $this->selected_thread->id)->where('user_id', $thread_user->id);
                if ($notification->exists()) {
                    $notification->increment('count');
                } else {
                    $notification = new MessengerThreadNotification();
                    $notification->messenger_thread_id = $this->selected_thread->id;
                    $notification->user_id = $thread_user->id;
                    $notification->save();
                }
            }
        }

        public function Render() {
            return view('livewire.messenger', ['messenger_threads' => $this->MessengerThreads()]);
        }

        private function MessengerThreads() {
            return $this->user->MessengerThreads()->withSum(['Notifications' => fn ($query) => $query->where('user_id', $this->user->id),], 'count')->latest()->get();
        }

        protected function Rules() {
            return [
                'selected_thread.user_id' => 'required|integer',
                'selected_thread.name' => 'required|string',
                'selected_thread.description' => 'nullable|string',
                'selected_thread.private' => 'required|boolean',
            ];
        }
    }
