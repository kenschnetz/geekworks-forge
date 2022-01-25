<?php

	namespace App\Utilities;

    use App\Models\Post as PostModel;
    use App\Models\PostDetail as PostDetailModel;
    use Illuminate\Support\Str;

    class Post {
        public static function Slug($title) {
            $slug = Str::slug($title);
            $counter = 0;
            while(PostModel::where('slug', $counter > 0 ? $slug . '-' . $counter : $slug)->withTrashed()->exists()) {
                $counter++;
            }
            if ($counter > 0) {
                $slug = $slug . '-' . $counter;
            }
            return $slug;
        }

        public static function GetMeta($post_meta, $name, $only_removed_meta = false) {
            $meta_keys = Post::MetaKeys($name);
            $items = PostDetailModel::find($post_meta->id)->{$meta_keys->method}();
            if ($only_removed_meta) {
                $items = $items->onlyTrashed();
            }
            $items = $items->get();
            $selected_items = [];
            foreach($items as $item) {
                $selected_item = [];
                $selected_item['id'] = $item->{Str::singular($meta_keys->method)}->id;
                $selected_item['name'] = $item->{Str::singular($meta_keys->method)}->name;
                $selected_item['description'] = $item->{Str::singular($meta_keys->method)}->description;
                if ($name === 'image') {
                    $selected_item['path'] = $item->{Str::singular($meta_keys->method)}->path;
                }
                if ($meta_keys->has_value) {
                    $selected_item['value'] = $item->value;
                }
                $selected_items[$selected_item['id']] = $selected_item;
            }
            return $selected_items;
        }

        public static function SaveMeta($post_meta, $items, $removed_items, $name, $polymorphic_type) {
            $meta_keys = Post::MetaKeys($name);
            Post::SaveMetaItems($name, $items, $post_meta, $meta_keys->model, $meta_keys->method, $meta_keys->item_id_key, $meta_keys->polymorphic_id_key, $meta_keys->polymorphic_type_key, $meta_keys->soft_deletes, $meta_keys->has_value, $polymorphic_type);
            Post::RemoveMetaItems($removed_items, $post_meta, $meta_keys->method, $meta_keys->item_id_key);
        }

        // NOTE: PRIVATE INTERNAL METHODS

        private static function SaveMetaItems($name, $items, $post_meta, $model, $method, $item_id_key, $polymorphic_id_key, $polymorphic_type_key, $soft_deletes, $has_value, $polymorphic_type) {
            foreach($items as $item) {
                $item = (object)$item;
                $post_item = PostDetailModel::find($post_meta->id)->$method();
                if ($soft_deletes) {
                    $post_item = $post_item->withTrashed();
                }
                $post_item = $post_item->where($item_id_key, $item->id)->first();
                if (empty($post_item)) {
                    $post_item = new $model;
                    $post_item->$item_id_key = $item->id;
                    if ($name === 'image') {
                        $post_item->post_detail_id = $post_meta->id;
                    } else {
                        $post_item->$polymorphic_id_key = $post_meta->id;
                        $post_item->$polymorphic_type_key = $polymorphic_type;
                    }
                }
                if ($has_value) {
                    $post_item->value = $item->value;
                }
                if ($soft_deletes) {
                    $post_item->deleted_at = null;
                }
                $post_item->save();
            }
        }

        private static function RemoveMetaItems($removed_items, $post_meta, $method, $item_id_key) {
            foreach($removed_items as $removed_item) {
                $removed_item = (object)$removed_item;
                PostDetailModel::find($post_meta->id)->$method()->where($item_id_key, $removed_item->id)->delete();
            }
        }

        private static function MetaKeys($name) {
            return match($name) {
                'image' => (object)[
                    'model' => 'App\Models\PostImage',
                    'method' => 'Images',
                    'item_id_key' => 'user_image_id',
                    'polymorphic_id_key' => null,
                    'polymorphic_type_key' => null,
                    'soft_deletes' => false,
                    'has_value' => false,
                ],
                'tag' => (object)[
                    'model' => 'App\Models\PostTag',
                    'method' => 'Tags',
                    'item_id_key' => 'tag_id',
                    'polymorphic_id_key' => 'post_taggable_id',
                    'polymorphic_type_key' => 'post_taggable_type',
                    'soft_deletes' => false,
                    'has_value' => false,
                ],
                'attribute' => (object)[
                    'model' => 'App\Models\PostAttribute',
                    'method' => 'Attributes',
                    'item_id_key' => 'attribute_id',
                    'polymorphic_id_key' => 'post_attributable_id',
                    'polymorphic_type_key' => 'post_attributable_type',
                    'soft_deletes' => true,
                    'has_value' => true
                ],
                'action' => (object)[
                    'model' => 'App\Models\PostAction',
                    'method' => 'Actions',
                    'item_id_key' => 'action_id',
                    'polymorphic_id_key' => 'post_actionable_id',
                    'polymorphic_type_key' => 'post_actionable_type',
                    'soft_deletes' => true,
                    'has_value' => true
                ],
            };
        }
	}
