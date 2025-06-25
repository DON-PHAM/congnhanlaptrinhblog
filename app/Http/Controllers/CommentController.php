<?php

namespace App\Http\Controllers;

use App\Repositories\CommentRepositoryInterface;
use App\Http\Requests\CommentRequest;

class CommentController extends BaseController
{
    protected $commentRepo;

    public function __construct(CommentRepositoryInterface $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = $this->commentRepo->paginate(20);
        return view('backend.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $data = $request->validated();
        $this->commentRepo->create($data);
        return redirect()->route('comments.index')->with('success', $this->getCreateSuccessMessage('comments'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $comment = $this->commentRepo->withRelations(['post', 'user', 'parent', 'replies.user'])->find($id);
        return view('backend.comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $comment = $this->commentRepo->find($id);
        return view('backend.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, $id)
    {
        $data = $request->validated();
        $this->commentRepo->update($id, $data);
        return redirect()->route('comments.index')->with('success', $this->getUpdateSuccessMessage('comments'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->commentRepo->delete($id);
        return redirect()->route('comments.index')->with('success', $this->getDeleteSuccessMessage('comments'));
    }
}
