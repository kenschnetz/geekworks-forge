<?php

    namespace App\Http\Livewire;

    use App\Models\User as UserModel;
    use App\Models\SkillLevel as SkillLevelModel;
    use App\Models\UserFollow as UserFollowModel;
    use App\Utilities\User as UserUtilities;
    use Illuminate\Foundation\Inspiring;
    use Illuminate\Support\Arr;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Str;
    use Livewire\Component;
    use Illuminate\Validation\Rule;

    class UserProfile extends Component {
        public string $user_name;
        public SkillLevelModel $skill_level;
        public UserModel $profile_user, $profile_user_edits;
        public array $stats, $top_posts, $recent_posts, $recent_comments, $images = [];
        public array|null $profile_photo;
        public bool $following, $can_edit = false, $editing = false, $my_profile;
        public string|null $bio;

        protected $listeners = ['RefreshMeta'];

        public function Mount() {
            $this->profile_user = UserModel::whereHas('Character', function($query) {
                $query->where('name', $this->user_name);
            })->first();
            if (empty($this->profile_user)) {
                abort(404);
            }
            $this->my_profile = auth()->user()->id === $this->profile_user->id;
            $this->skill_level = SkillLevelModel::where('points_required', '<=', $this->profile_user->Character->skill_points)->first();
            $this->stats = UserUtilities::GetStats($this->profile_user);
            // TODO: implement a post scoring system where every upvote, view and comment contributes to a post_score column on the posts table to make this faster
            $this->top_posts = $this->profile_user->Posts()->whereHas('Upvotes')->where('published', true)->where('moderated', false)->with('ActivePostDetails')->withCount('Upvotes')->orderBy('upvotes_count', 'DESC')->take(5)->get()->toArray();
            $recent_posts = $this->profile_user->Posts();
            if (!$this->my_profile) {
                $recent_posts->where('published', true)->where('moderated', false);
            }
            $this->recent_posts = $recent_posts->latest()->with('ActivePostDetails')->take(5)->get()->toArray();
            $this->recent_comments = $this->profile_user->Comments()->latest()->with('Post', 'Post.ActivePostDetails')->take(5)->get()->toArray();
            $this->following = auth()->user()->Follows()->where('followed_user_id', $this->profile_user->id)->exists();
            $this->can_edit = $this->profile_user->id === auth()->user()->id;
            $profile_photo = $this->profile_user->Character->ProfilePhoto;
            if (!empty($profile_photo)) {
                $selected_profile_photo = [
                    'id' => $profile_photo->id,
                    'name' => $profile_photo->name,
                    'description' => $profile_photo->description,
                    'path' => $profile_photo->path,
                ];
                $this->images[$profile_photo->id] = $selected_profile_photo;
            }
            $this->profile_photo = optional($profile_photo)->toArray();
        }

        public function RefreshMeta($name, $selected_items, $removed_items) {
            $this->images = $selected_items;
            $this->profile_photo = Arr::first($this->images);
        }

        public function ToggleFollow() {
            if ($this->following) {
                auth()->user()->Follows()->where('followed_user_id', $this->profile_user->id)->delete();
            } else {
                $user_follow = new UserFollowModel;
                $user_follow->user_id = auth()->user()->id;
                $user_follow->followed_user_id = $this->profile_user->id;
                $user_follow->save();
            }
            $this->following = !$this->following;
        }

        public function EnableEditMode() {
            $this->profile_user_edits = $this->profile_user;
            if ($this->can_edit) {
                $this->editing = true;
            } else {
                abort(403);
            }
        }

        public function Inspire() {
            $this->profile_user_edits['character']->bio = Inspiring::quote();
        }

        public function CancelEdit() {
            $this->editing = false;
        }

        public function SaveProfile() {
            if ($this->can_edit) {
                $this->validate();
                $this->profile_user->Character->user_image_id = $this->profile_photo['id'] ?? null;
                $this->profile_user->Character->name = str_replace(' ', '', ucwords($this->profile_user_edits['character']->name));
                $this->profile_user->Character->bio = $this->profile_user_edits['character']->bio;
                $this->profile_user->Character->save();
                $this->editing = false;
                redirect()->route('user-profile');
            } else {
                abort(403);
            }
        }

        public function Render() {
            return view('livewire.user-profile');
        }
        protected function Rules() {
            return [
                'profile_user_edits.character.name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('user_characters', 'name')->ignore($this->profile_user->Character->id)
                ],
                'profile_user_edits.character.bio' => 'required|string|max:600',
                'profile_user_edits.character.user_image_id' => 'nullable|integer',
            ];
        }
    }
