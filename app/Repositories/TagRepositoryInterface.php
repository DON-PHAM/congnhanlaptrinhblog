<?php
namespace App\Repositories;

interface TagRepositoryInterface
{
    public function all();
    public function paginate($perPage = 20);
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
} 