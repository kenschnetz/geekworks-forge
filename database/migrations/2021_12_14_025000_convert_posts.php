<?php

    use App\Models\OldPost as OldPostModel;
    use App\Models\Post as PostModel;
    use App\Models\PostDetail as PostDetailModel;
    use App\Models\PostDetailImage as PostDetailImageModel;
    use App\Models\PostDetailTag as PostDetailTagModel;
    use App\Models\PostDetailAttribute as PostDetailAttributeModel;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\DB;

    class ConvertPosts extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            DB::table('post_types')->insert([
                [
                    'name' => 'Idea',
                    'description' => 'An idea or inspiration for tabletop role playing games.',
                ],
                [
                    'name' => 'Question',
                    'description' => 'A request for information or input about tabletop role playing games.',
                ],
                [
                    'name' => 'Article',
                    'description' => 'An article conveying interesting information about tabletop role playing games.',
                ],
            ]);
            DB::table('old_posts')->whereNull('deleted_at')->get()->each(function($post) {
                $new_post = new PostModel;
                $new_post->id = $post->id;
                $new_post->user_id = $post->user_id;
                $new_post->system_id = $post->system_id;
                $new_post->category_id = $post->category_id;
                $new_post->published = true;
                $new_post->moderated = false;
                $new_post->allow_conversions = true;
                $new_post->is_conversion = false;
                $new_post->is_art_only = false;
                $new_post->locked_art = false;
                $new_post->locked_canon = true;
                $new_post->created_at = $post->created_at;
                $new_post->save();
                $new_post_detail = new PostDetailModel;
                $new_post_detail->post_id = $new_post->id;
                $new_post_detail->version = 1;
                $new_post_detail->active = true;
                $new_post_detail->title = $post->title;
                $new_post_detail->slug = $post->slug;
                $new_post_detail->description = $post->description;
                $new_post_detail->content = $post->content;
                $new_post_detail->requesting_recommendations = false;
                $new_post_detail->save();
                $post_images = DB::table('post_images')->where('post_id', $post->id)->get();
                foreach($post_images as $post_image) {
                    $new_post_detail_image = new PostDetailImageModel;
                    $new_post_detail_image->post_detail_id = $new_post_detail->id;
                    $new_post_detail_image->image_id = $post_image->image_id;
                    $new_post_detail_image->created_at = $post_image->created_at;
                    $new_post_detail_image->save();
                }
                $post_tags = DB::table('post_tags')->where('post_id', $post->id)->get();
                foreach($post_tags as $post_tag) {
                    $new_post_detail_tag = new PostDetailTagModel;
                    $new_post_detail_tag->post_detail_id = $new_post_detail->id;
                    $new_post_detail_tag->tag_id = $post_tag->tag_id;
                    $new_post_detail_tag->created_at = $post_tag->created_at;
                    $new_post_detail_tag->save();
                }
                $post_attributes = DB::table('post_attributes')->where('post_id', $post->id)->get();
                foreach($post_attributes as $post_attribute) {
                    $new_post_detail_attribute = new PostDetailAttributeModel;
                    $new_post_detail_attribute->post_detail_id = $new_post_detail->id;
                    $new_post_detail_attribute->attribute_id = $post_attribute->attribute_id;
                    $new_post_detail_attribute->value = $post_attribute->value;
                    $new_post_detail_attribute->created_at = $post_tag->created_at;
                    $new_post_detail_attribute->save();
                }
            });
            Schema::table('post_contributors', function (Blueprint $table) {
                $table->dropForeign(['post_id']);
                $table->foreign('post_id')->onDelete('cascade')->references('id')->on('posts');
            });
            Schema::table('post_upvotes', function (Blueprint $table) {
                $table->dropForeign(['post_id']);
                $table->foreign('post_id')->onDelete('cascade')->references('id')->on('posts');
            });
            Schema::table('post_views', function (Blueprint $table) {
                $table->dropForeign(['post_id']);
                $table->foreign('post_id')->onDelete('cascade')->references('id')->on('posts');
            });
            Schema::table('post_comments', function (Blueprint $table) {
                $table->dropForeign(['post_id']);
                $table->foreign('post_id')->onDelete('cascade')->references('id')->on('posts');
            });
            Schema::table('collection_posts', function (Blueprint $table) {
                $table->dropForeign(['post_id']);
                $table->foreign('post_id')->onDelete('cascade')->references('id')->on('posts');
            });
            Schema::table('old_posts', function (Blueprint $table) {
                $table->dropForeign('posts_user_id_foreign');
                $table->dropForeign('posts_post_id_foreign');
                $table->dropForeign('posts_system_id_foreign');
                $table->dropForeign('posts_category_id_foreign');
            });
            Schema::drop('post_images');
            Schema::drop('post_tags');
            Schema::drop('post_attributes');
            Schema::drop('old_posts');
            Schema::drop('content_subtypes');
            Schema::drop('content_types');
            Schema::table('posts', function (Blueprint $table) {
                $table->foreign('post_type_id')->onDelete('cascade')->references('id')->on('post_types');
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('post_id')->onDelete('cascade')->references('id')->on('posts');
                $table->foreign('system_id')->onDelete('cascade')->references('id')->on('systems');
                $table->foreign('category_id')->onDelete('cascade')->references('id')->on('categories');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            //
        }
    }
