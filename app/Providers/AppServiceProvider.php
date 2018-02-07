<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;
=======
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
         Schema::defaultStringLength(191);
    }

=======
        // 
    }
 
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
