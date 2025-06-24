<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepositoryInterface;

class HomeController extends Controller
{
    protected $postRepo;

    public function __construct(PostRepositoryInterface $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function index()
    {
        $featuredPost = $this->postRepo->all()->where('is_featured', true)->sortByDesc('created_at')->first();
        $posts = $this->postRepo->all()->where('id', '!=', optional($featuredPost)->id)->sortByDesc('created_at');
        return view('frontend.index', compact('featuredPost', 'posts'));
    }

    public function lazyLoadPosts() {
        $page = request()->input('page', 1);
        $perPage = request()->input('per_page', 10);
        $query = $this->postRepo->all()->sortByDesc('created_at');
        $total = $query->count();
        $items = $query->slice(($page - 1) * $perPage, $perPage)->values();
        $data = $items->map(function($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'slug' => $post->slug,
                'excerpt' => $post->excerpt,
                'image' => $post->image ? asset('storage/' . $post->image) : null,
                'created_at' => $post->created_at->format('d/m/Y'),
                'category' => $post->category ? [
                    'name' => $post->category->name,
                    'slug' => $post->category->slug
                ] : null,
            ];
        });
        return response()->json([
            'data' => $data,
            'current_page' => (int)$page,
            'per_page' => (int)$perPage,
            'total' => $total,
            'last_page' => ceil($total / $perPage),
        ]);
    }
} 