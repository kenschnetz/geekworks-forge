<?php

    namespace App\Providers;

    use App\Search\Posts;
    use Illuminate\Support\ServiceProvider;

    class AppServiceProvider extends ServiceProvider {
        /**
         * Register any application services.
         *
         * @return void
         */
        public function register() {
            //
        }

        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot() {
            Posts::bootSearchable();
        }
    }
