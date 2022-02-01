<?php

    namespace App\Http\Livewire;

    use App\Models\PostCollaboration as PostCollaborationModel;
    use App\Models\PostCollaborator as PostCollaboratorModel;
    use App\Models\PostDetail as PostDetailModel;
    use App\Models\PostImage as PostImageModel;
    use App\Models\PostTag as PostTagModel;
    use App\Models\PostAttribute as PostAttributeModel;
    use App\Models\PostAction as PostActionModel;
    use Livewire\Component;

    class Collaboration extends Component {
        public int|null $collaboration_id;
        public PostCollaborationModel $collaboration;
        public PostDetailModel $original_post_details, $new_post_details;
        public bool $my_collaboration, $has_title_changes = false, $has_description_changes = false, $has_content_changes, $has_tag_changes = false, $has_attribute_changes = false, $has_action_changes = false;

        public function Mount() {
            if (empty($this->collaboration_id)) {
                abort(404);
            }
            $this->collaboration = PostCollaborationModel::where('id', $this->collaboration_id)->first();
            $this->original_post_details = PostDetailModel::where('id', $this->collaboration->post_detail_id)->first();
            $this->new_post_details = $this->original_post_details;
            $this->my_collaboration = $this->collaboration->user_id === auth()->user()->id;
            $this->has_title_changes = strcmp($this->new_post_details->title, $this->collaboration->title) !== 0;
            $this->has_description_changes = strcmp($this->new_post_details->description, $this->collaboration->description) !== 0;
            $this->has_content_changes = strcmp($this->new_post_details->content, $this->collaboration->content) !== 0;
//            $has_tag_changes =
//            $has_attribute_changes =
//            $has_action_changes =
        }

        public function FormatDiff($old, $new, $return = 'old'){
            $from_start = strspn($old ^ $new, "\0");
            $from_end = strspn(strrev($old) ^ strrev($new), "\0");

            $old_end = strlen($old) - $from_end;
            $new_end = strlen($new) - $from_end;

            $start = substr($new, 0, $from_start);
            $end = substr($new, $new_end);
            $new_diff = substr($new, $from_start, $new_end - $from_start);
            $old_diff = substr($old, $from_start, $old_end - $from_start);

            $new = $start . '<span style="background-color:#ccffcc">' . $new_diff . '</span>' . $end;
            $old = $start . '<span style="background-color:#ffcccc">' . $old_diff . '</span>' . $end;
            return match($return) {
                'old' => $old,
                'new' => $new,
            };
        }

        public function Cancel() {
            return redirect()->route('collaborations');
        }

        public function Decline() {
            $this->collaboration->status = 'Closed';
            $this->collaboration->outcome = 'Declined';
            $this->collaboration->save();
            return redirect()->route('collaborations');
        }

        public function Accept($key) {
            $this->new_post_details->$key = $this->collaboration->$key;
            $this->collaboration->{$key . '_accepted'} = true;
        }

        public function Unaccept($key) {
            $this->new_post_details->$key = $this->original_post_details->$key;
            $this->collaboration->{$key . '_accepted'} = false;
        }

        public function Collaborate() {
            $this->original_post_details->active = false;
            $this->original_post_details->save();
            $new_post_details = new PostDetailModel($this->new_post_details->toArray());
            $new_post_details->version = $this->original_post_details->version += 1;
            $new_post_details->active = true;
            $new_post_details->save();
            $new_post_details_image = new PostImageModel;
            $new_post_details_image->post_detail_id = $new_post_details->id;
            $new_post_details_image->user_image_id = $this->original_post_details->Images()->first()->user_image_id;
            $new_post_details_image->save();
            foreach($this->original_post_details->Tags as $post_tag) {
                $new_tag = new PostTagModel($post_tag->toArray());
                $new_tag->post_taggable_id = $new_post_details->id;
                $new_tag->save();
            }
            foreach($this->original_post_details->Attributes as $post_attribute) {
                $new_attribute = new PostAttributeModel($post_attribute->toArray());
                $new_attribute->post_attributable_id = $new_post_details->id;
                $new_attribute->save();
            }
            foreach($this->original_post_details->Actions as $post_action) {
                $new_action = new PostActionModel($post_action->toArray());
                $new_action->post_actionable_id = $new_post_details->id;
                $new_action->save();
            }
            $new_post_collaborator = new PostCollaboratorModel;
            $new_post_collaborator->post_id = $this->original_post_details->Post->id;
            $new_post_collaborator->user_id = $this->collaboration->user_id;
            $new_post_collaborator->post_collaboration_id = $this->collaboration->id;
            $new_post_collaborator->save();
            $changes_count = 0;
            $changes_count += $this->has_title_changes ? 1 : 0;
            $changes_count += $this->has_description_changes ? 1 : 0;
            $changes_count += $this->has_content_changes ? 1 : 0;
            $accepted_changes_count = 0;
            $accepted_changes_count += $this->collaboration->title_accepted ? 1 : 0;
            $accepted_changes_count += $this->collaboration->description_accepted ? 1 : 0;
            $accepted_changes_count += $this->collaboration->content_accepted ? 1 : 0;
            if($changes_count === $accepted_changes_count) {
                $this->collaboration->outcome = 'Full';
            } else {
                $this->collaboration->outcome = 'Partial';
            }
            $this->collaboration->status = 'Closed';
            $this->collaboration->save();
            return redirect()->route('post', ['slug' => $this->original_post_details->Post->slug]);
        }

        public function Render() {
            return view('livewire.collaboration');
        }

        protected function Rules() {
            return [
                'new_post_details.title' => 'nullable|string',
                'collaboration.title' => 'nullable|string',
                'collaboration.title_accepted' => 'nullable|bool',
                'new_post_details.description' => 'nullable|string',
                'collaboration.description' => 'nullable|string',
                'collaboration.description_accepted' => 'nullable|bool',
                'new_post_details.content' => 'nullable|string',
                'collaboration.content' => 'nullable|string',
                'collaboration.content_accepted' => 'nullable|bool',
            ];
        }
    }
