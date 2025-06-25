<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryInterface;
use App\Http\Requests\CategoryRequest;

class CategoryController extends BaseController
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryRepo->paginate(10);
        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryRepo->all();
        return view('backend.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $this->categoryRepo->create($data);
        return redirect()->route('categories.index')->with('success', $this->getCreateSuccessMessage('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = $this->categoryRepo->find($id);
        return view('backend.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = $this->categoryRepo->find($id);
        $categories = $this->categoryRepo->all()->where('id', '!=', $category->id);
        return view('backend.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->validated();
        $this->categoryRepo->update($id, $data);
        return redirect()->route('categories.index')->with('success', $this->getUpdateSuccessMessage('categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->categoryRepo->delete($id);
        return redirect()->route('categories.index')->with('success', $this->getDeleteSuccessMessage('categories'));
    }

    /**
     * Hiển thị danh sách category cho frontend
     */
    public function listFrontend()
    {
        $categories = $this->categoryRepo->all();
        return view('frontend.categories.list', compact('categories'));
    }

    /**
     * Hiển thị danh sách bài viết theo category (slug)
     */
    public function postsByCategory($slug)
    {
        $category = $this->categoryRepo->findBySlug($slug);
        if (!$category) {
            abort(404);
        }
        $posts = $category->posts()->latest()->paginate(10);
        return view('frontend.categories.posts', compact('category', 'posts'));
    }
}
