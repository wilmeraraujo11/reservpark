<?php

namespace App\Providers;

use App\Rol;
use Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //cuando el rol es 1 pertenece a un rol de superadministrador
        Blade::if('superadmin', function(){
            return auth()->user()->id_rol === 1;
        });

        Blade::if('nosuperadmin', function(){
            return auth()->user()->id_rol != 1;
        });
        Blade::if('superadmin_dueno', function(){
            return auth()->user()->id_rol === 1 or auth()->user()->id_rol === 3 ;
        });
        
        Blade::if('admin', function(){
            return auth()->user()->id_rol === 2;
        });
        
    }

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
