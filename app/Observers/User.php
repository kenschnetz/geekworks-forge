<?php

    namespace App\Observers;

    use App\Models\UserCharacter as UserCharacterModel;
    use Illuminate\Foundation\Inspiring;

    class User {
        /**
         * Handle the User "created" event.
         *
         * @param \App\Models\User $user
         * @return void
         */
        public function created(\App\Models\User $user) {
            $user_character = new UserCharacterModel;
            $user_character->user_id = $user->id;
            $user_character->name = str_replace(' ', '', $user->name);
            $user_character->bio = Inspiring::quote();
            $user_character->save();
        }
    }
