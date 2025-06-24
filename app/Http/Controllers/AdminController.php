<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $postCount = Post::count();
        $categoryCount = Category::count();
        $commentCount = Comment::count();
        $userCount = User::count();
        return view('backend.index', compact('postCount', 'categoryCount', 'commentCount', 'userCount'));
    }
}
