<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\TagRepositoryInterface;

class AdminController extends Controller
{
    protected $postRepo;
    protected $categoryRepo;
    protected $commentRepo;
    protected $userRepo;
    protected $tagRepo;

    public function __construct(
        PostRepositoryInterface $postRepo,
        CategoryRepositoryInterface $categoryRepo,
        CommentRepositoryInterface $commentRepo,
        UserRepositoryInterface $userRepo,
        TagRepositoryInterface $tagRepo
    ) {
        $this->postRepo = $postRepo;
        $this->categoryRepo = $categoryRepo;
        $this->commentRepo = $commentRepo;
        $this->userRepo = $userRepo;
        $this->tagRepo = $tagRepo;
    }

    public function index()
    {
        $postCount = $this->postRepo->all()->count();
        $categoryCount = $this->categoryRepo->all()->count();
        $commentCount = $this->commentRepo->all()->count();
        $userCount = $this->userRepo->all()->count();
        $tagCount = $this->tagRepo->all()->count();
        
        // Dữ liệu cho biểu đồ tròn
        $chartData = [
            'posts' => $postCount,
            'categories' => $categoryCount,
            'comments' => $commentCount,
            'users' => $userCount,
            'tags' => $tagCount
        ];
        
        // Thống kê chi tiết
        $featuredPosts = $this->postRepo->all()->where('is_featured', true)->count();
        $draftPosts = $this->postRepo->all()->where('status', 'draft')->count();
        $publicPosts = $this->postRepo->all()->where('status', 'public')->count();
        $adminUsers = $this->userRepo->all()->where('role', 'admin')->count();
        $supperAdminUsers = $this->userRepo->all()->where('role', 'supperadmin')->count();
        $normalUsers = $this->userRepo->all()->where('role', 'user')->count();
        
        return view('backend.index', compact(
            'postCount', 
            'categoryCount', 
            'commentCount', 
            'userCount',
            'tagCount',
            'chartData',
            'featuredPosts',
            'draftPosts', 
            'publicPosts',
            'adminUsers',
            'supperAdminUsers',
            'normalUsers'
        ));
    }
}
