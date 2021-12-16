<?php

    use App\Models\User as UserModel;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class RefactorUser extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            DB::statement('ALTER TABLE users MODIFY COLUMN email_verified_at VARCHAR(255) AFTER email');
            DB::statement('ALTER TABLE users MODIFY COLUMN password VARCHAR(255) AFTER email_verified_at');
            Schema::table('users', function(Blueprint $table) {
                $table->string('handle')->nullable()->after('password');
                $table->string('bio', 600)->nullable()->after('handle');
                $table->integer('skill')->default(0)->after('bio');
                $table->integer('reputation')->default(0)->after('skill');
                $table->integer('level')->default(0)->after('reputation');
                $table->integer('experience')->default(0)->after('level');
                $table->text('profile_image_path')->nullable()->after('experience');
            });
            UserModel::all()->each(function($user) {
                $handle = Str::of($user->name)->lower();
                $handle = Str::of($handle)->title();
                $handle = Str::of($handle)->trim();
                $handle = str_replace(' ', '', $handle);
                $user->handle = $handle;
                $user->save();
            });
            Schema::table('users', function(Blueprint $table) {
                $table->string('handle')->nullable(false)->unique()->change();
            });
            Schema::drop('user_characters');
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            DB::statement('ALTER TABLE users MODIFY COLUMN email_verified_at VARCHAR(255) AFTER unread_global_messages');
            DB::statement('ALTER TABLE users MODIFY COLUMN password VARCHAR(255) AFTER email_verified_at');
            Schema::table('users', function(Blueprint $table) {
                $table->dropColumn(['handle', 'bio', 'skill', 'reputation', 'level', 'experience', 'profile_image_path']);
            });
            Schema::create('user_characters', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->string('name');
                $table->string('bio', 600)->nullable();
                $table->integer('skill')->default(0);
                $table->integer('reputation')->default(0);
                $table->integer('level')->default(0);
                $table->integer('experience')->default(0);
                $table->text('profile_image_path')->nullable();
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
            });
        }
    }
