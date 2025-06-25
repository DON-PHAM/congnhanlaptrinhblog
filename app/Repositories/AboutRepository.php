<?php
namespace App\Repositories;

use App\Models\About;

class AboutRepository implements AboutRepositoryInterface
{
    public function all()
    {
        return About::all();
    }

    public function find($id)
    {
        return About::findOrFail($id);
    }

    public function create(array $data)
    {
        return About::create($data);
    }

    public function update($id, array $data)
    {
        $about = $this->find($id);
        $about->update($data);
        return $about;
    }

    public function delete($id)
    {
        $about = $this->find($id);
        return $about->delete();
    }

    public function first()
    {
        return About::first();
    }
} 