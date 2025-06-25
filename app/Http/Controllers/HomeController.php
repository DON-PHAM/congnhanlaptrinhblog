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
        $featuredPost = $this->postRepo->paginateWithRelations(1, ['category'])->first();
        $posts = $this->postRepo->paginateWithRelations(10, ['category']);
        if ($featuredPost) {
            $posts = $this->postRepo->paginateWithRelations(10, ['category'])->where('id', '!=', $featuredPost->id);
        }
        return view('frontend.index', compact('featuredPost', 'posts'));
    }

    public function lazyLoadPosts() {
        $page = request()->input('page', 1);
        $perPage = request()->input('per_page', 10);
        $query = $this->postRepo->paginateWithRelations($perPage, ['category']);
        $total = $query->total();
        $items = $query->items();
        $data = collect($items)->map(function($post) {
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
            'last_page' => $query->lastPage(),
        ]);
    }
} 