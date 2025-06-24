<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\SettingRepositoryInterface;
use App\Repositories\SettingRepository;
use App\Repositories\TagRepositoryInterface;
use App\Repositories\TagRepository;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\CategoryComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->make('view')->composer(
            ['frontend.modules.siderbar_menu', 'frontend.modules.siderbar_right'],
            function ($view) {
                $categoryRepo = app(\App\Repositories\CategoryRepositoryInterface::class);
                $postRepo = app(\App\Repositories\PostRepositoryInterface::class);
                $tagRepo = app(TagRepositoryInterface::class);
                (new \App\Http\ViewComposers\CategoryComposer($categoryRepo, $postRepo, $tagRepo))->compose($view);
            }
        );
    }
}
