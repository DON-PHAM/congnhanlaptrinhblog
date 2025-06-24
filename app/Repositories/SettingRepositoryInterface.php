<?php
namespace App\Repositories;

interface SettingRepositoryInterface
{
    public function all();
    public function paginate($perPage = 20);
    public function find($id);
    public function findByKey($key);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
} 