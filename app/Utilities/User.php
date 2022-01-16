<?php

	namespace App\Utilities;

    use Illuminate\Support\Str;

    class User {
        public static function GetStats($user) {
            return [
                'idea_count' => User::GetStat('idea', $user),
                'question_count' => User::GetStat('question', $user),
                'article_count' => User::GetStat('article', $user),
                'comment_count' => User::GetStat('comment', $user),
            ];
        }

        // NOTE: PRIVATE INTERNAL METHODS

        private static function GetStat($name, $user) {
            return $user->{Str::plural(Str::ucfirst($name))}->count();
        }

	}
