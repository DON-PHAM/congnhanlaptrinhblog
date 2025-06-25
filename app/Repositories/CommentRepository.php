<?php
namespace App\Repositories;

use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    public function all()
    {
        return Comment::all();
    }

    public function paginate($perPage = 20)
    {
        return Comment::with(['post', 'user', 'parent'])
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }

    public function find($id)
    {
        return Comment::findOrFail($id);
    }

    public function create(array $data)
    {
        return Comment::create($data);
    }

    public function update($id, array $data)
    {
        $comment = $this->find($id);
        $comment->update($data);
        return $comment;
    }

    public function delete($id)
    {
        $comment = $this->find($id);
        // Xóa tất cả replies trước
        $comment->replies()->delete();
        return $comment->delete();
    }

    public function withRelations($relations = [])
    {
        return Comment::with($relations);
    }
} 