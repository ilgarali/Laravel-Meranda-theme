<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('categoires',Category::all());
        view()->share('pposts',Post::orderBy('hit','DESC')
        ->leftjoin('categories','posts.id','=','categories.id')
        ->leftJoin('users','posts.user_id','=','users.id')
        ->take(3)->get());
    }
}
