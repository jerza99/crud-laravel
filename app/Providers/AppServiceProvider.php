<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider{
    /**
     * Register any application services.
     */
    public function register(): void{
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void{

        // Establece la longitud predeterminada de las cadenas de texto en las migraciones
        Schema::defaultStringLength(191);
    }
}
