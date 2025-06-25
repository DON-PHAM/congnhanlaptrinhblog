<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\TagRepositoryInterface;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends BaseController
{
    protected $postRepo;
    protected $categoryRepo;
    protected $tagRepo;

    public function __construct(PostRepositoryInterface $postRepo, CategoryRepositoryInterface $categoryRepo, TagRepositoryInterface $tagRepo)
    {
        $this->postRepo = $postRepo;
        $this->categoryRepo = $categoryRepo;
        $this->tagRepo = $tagRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postRepo->paginate(10);
        return view('backend.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryRepo->all();
        $tags = $this->tagRepo->all();
        return view('backend.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['is_featured'] = $request->has('is_featured');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }
        $tags = $request->input('tags', []);
        $post = $this->postRepo->create($data);
        if (!empty($tags)) {
            $post->tags()->attach($tags);
        }
        return redirect()->route('posts.index')->with('success', $this->getCreateSuccessMessage('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = $this->postRepo->find($id);
        return view('backend.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = $this->postRepo->find($id);
        $categories = $this->categoryRepo->all();
        $tags = $this->tagRepo->all();
        return view('backend.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, $id)
    {
        $data = $request->validated();
        $data['is_featured'] = $request->has('is_featured');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }
        $tags = $request->input('tags', []);
        $post = $this->postRepo->update($id, $data);
        if (!empty($tags)) {
            $post->tags()->sync($tags);
        } else {
            $post->tags()->detach();
        }
        return redirect()->route('posts.index')->with('success', $this->getUpdateSuccessMessage('posts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = $this->postRepo->find($id);
        if ($post && $post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }
        $this->postRepo->delete($id);
        return redirect()->route('posts.index')->with('success', $this->getDeleteSuccessMessage('posts'));
    }

    /**
     * Hiển thị chi tiết bài viết ở frontend
     */
    public function showFrontend($slug)
    {
        $post = $this->postRepo->findBySlug($slug);
        if (!$post) {
            abort(404);
        }
        $post->increment('views');
        $post->refresh();
        return view('frontend.posts.detail', compact('post'));
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $posts = $this->postRepo->all()->filter(function($post) use ($q) {
            return stripos($post->title, $q) !== false;
        });
        return view('frontend.posts.search', compact('q', 'posts'));
    }

    /**
     * Tăng lượt xem bài viết qua AJAX
     */
    public function increaseView($id)
    {
        $post = $this->postRepo->find($id);
        if ($post) {
            $post->increment('views');
            return response()->json(['success' => true, 'views' => $post->views + 1]);
        }
        return response()->json(['success' => false], 404);
    }
}
