<?php
namespace App\Repositories;

use App\Models\Setting;

class SettingRepository implements SettingRepositoryInterface
{
    public function all()
    {
        return Setting::all();
    }

    public function paginate($perPage = 20)
    {
        return Setting::orderBy('key')->paginate($perPage);
    }

    public function find($id)
    {
        return Setting::findOrFail($id);
    }

    public function findByKey($key)
    {
        return Setting::where('key', $key)->first();
    }

    public function create(array $data)
    {
        return Setting::create($data);
    }

    public function update($id, array $data)
    {
        $setting = $this->find($id);
        $setting->update($data);
        return $setting;
    }

    public function delete($id)
    {
        $setting = $this->find($id);
        return $setting->delete();
    }
} 