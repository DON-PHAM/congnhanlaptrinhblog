<?php

namespace App\Http\Controllers;

use App\Repositories\TagRepositoryInterface;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagRepo;

    public function __construct(TagRepositoryInterface $tagRepo)
    {
        $this->tagRepo = $tagRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = $this->tagRepo->paginate(20);
        return view('backend.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:100|unique:tags,slug',
        ]);
        $this->tagRepo->create($data);
        return redirect()->route('tags.index')->with('success', 'Tạo thẻ thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('tags.index'); // Không cần show chi tiết
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tag = $this->tagRepo->find($id);
        return view('backend.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:100|unique:tags,slug,' . $id,
        ]);
        $this->tagRepo->update($id, $data);
        return redirect()->route('tags.index')->with('success', 'Cập nhật thẻ thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->tagRepo->delete($id);
        return redirect()->route('tags.index')->with('success', 'Xóa thẻ thành công!');
    }
}
