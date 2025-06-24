<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function paginate($perPage = 10)
    {
        return Category::orderByDesc('id')->paginate($perPage);
    }

    public function find($id)
    {
        return Category::findOrFail($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update($id, array $data)
    {
        $category = $this->find($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        $category = $this->find($id);
        return $category->delete();
    }

    /**
     * Tìm category theo slug
     */
    public function findBySlug($slug)
    {
        return Category::where('slug', $slug)->first();
    }
} 