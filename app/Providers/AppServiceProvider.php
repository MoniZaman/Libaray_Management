<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\CategoryModel;
use App\AuthorModel;
use App\BookModel;
use App\BookIssue;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('book', BookModel::all());
        view()->share('bookissues', BookIssue::all());
        view()->share('category', CategoryModel::all());
        view()->share('author', AuthorModel::all());
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
