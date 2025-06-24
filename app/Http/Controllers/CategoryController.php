<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'icon' => 'nullable|string|max:255',
        ]);
        $this->categoryRepo->create($data);
        return redirect()->route('categories.index')->with('success', 'Tạo danh mục thành công!');
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
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $id,
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'icon' => 'nullable|string|max:255',
        ]);
        $this->categoryRepo->update($id, $data);
        return redirect()->route('categories.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->categoryRepo->delete($id);
        return redirect()->route('categories.index')->with('success', 'Xóa danh mục thành công!');
    }
}
