<?php
namespace App\Repositories;

use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function all()
    {
        return Post::all();
    }

    public function paginate($perPage = 10)
    {
        return Post::with(['category', 'user'])->orderByDesc('id')->paginate($perPage);
    }

    public function find($id)
    {
        return Post::with(['category', 'user'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function update($id, array $data)
    {
        $post = $this->find($id);
        $post->update($data);
        return $post;
    }

    public function delete($id)
    {
        $post = $this->find($id);
        return $post->delete();
    }
} 