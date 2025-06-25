<?php
namespace App\Repositories;

interface PostRepositoryInterface
{
    public function all();
    public function paginate($perPage = 10);
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    /**
     * Tìm post theo slug
     */
    public function findBySlug($slug);
    public function paginateWithRelations($perPage = 10, $relations = ['category']);
} 