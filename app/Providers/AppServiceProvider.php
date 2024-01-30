<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Retrieve categories with the most posts and pass them to all views
        View::composer('*', function ($view) {
            $categories = Category::select('categories.*', DB::raw('COUNT(posts.id) as post_count'))
                ->leftJoin('posts', 'categories.id', '=', 'posts.category_id')
                ->groupBy('categories.id')
                ->orderByDesc('post_count')
                ->limit(7)
                ->get();
    
            $view->with('categories', $categories);
        });
    }
}
