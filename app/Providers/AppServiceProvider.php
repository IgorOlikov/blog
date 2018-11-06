<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Post;
use App\Category;
use App\Comment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('pages._sidebar', function ($view){
            $view->with('popularPosts', Post::getPopularPosts());

            $view->with('featuredPosts', Post::getFeaturedPosts());

            $view->with('recentPosts', Post::getRecentPosts());

            $view->with('categories', Category::all());
        });

        view()->composer('admin._sidebar', function ($view){
            $view->with('newCommentsCount', Comment::where('status',0)->count());


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
