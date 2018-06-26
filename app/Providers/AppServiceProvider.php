<?php

namespace App\Providers;

use App\Entities\Documento;
use App\Entities\Noticia;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Relation::morphMap([
            'noticia' => Noticia::class,
            'documento' => Documento::class,
        ]);
    }
}
