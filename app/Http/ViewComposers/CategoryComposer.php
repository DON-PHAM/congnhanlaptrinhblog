<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\TagRepositoryInterface;

class CategoryComposer
{
    protected $categoryRepo;
    protected $postRepo;
    protected $tagRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo, PostRepositoryInterface $postRepo, TagRepositoryInterface $tagRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->postRepo = $postRepo;
        $this->tagRepo = $tagRepo;
    }

    public function compose(View $view)
    {
        $view->with('sidebarCategories', $this->categoryRepo->all()->sortBy('display_order'));
        $view->with('sidebarLatestPosts', $this->postRepo->all()->sortByDesc('created_at')->take(5));
        $view->with('sidebarTags', $this->tagRepo->all()->loadCount('posts'));
    }
} 