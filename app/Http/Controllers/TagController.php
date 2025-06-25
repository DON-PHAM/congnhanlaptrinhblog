<?php

namespace App\Http\Controllers;

use App\Repositories\TagRepositoryInterface;
use App\Http\Requests\TagRequest;

class TagController extends BaseController
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
    public function store(TagRequest $request)
    {
        $data = $request->validated();
        $this->tagRepo->create($data);
        return redirect()->route('tags.index')->with('success', $this->getCreateSuccessMessage('tags'));
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
    public function update(TagRequest $request, $id)
    {
        $data = $request->validated();
        $this->tagRepo->update($id, $data);
        return redirect()->route('tags.index')->with('success', $this->getUpdateSuccessMessage('tags'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->tagRepo->delete($id);
        return redirect()->route('tags.index')->with('success', $this->getDeleteSuccessMessage('tags'));
    }
}
