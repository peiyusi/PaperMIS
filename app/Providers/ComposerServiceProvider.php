<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot() {

        View::composer(
            '/admin/student/home', 'App\Http\ViewComposers\StudentComposer'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        //
    }
}
