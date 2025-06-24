<?php

namespace App\Http\Controllers;

use App\Repositories\SettingRepositoryInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $settingRepo;

    public function __construct(SettingRepositoryInterface $settingRepo)
    {
        $this->settingRepo = $settingRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = $this->settingRepo->paginate(20);
        return view('backend.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'key' => 'required|string|max:255|unique:settings,key',
            'value' => 'nullable|string',
        ]);
        $this->settingRepo->create($data);
        return redirect()->route('settings.index')->with('success', 'Tạo cấu hình thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $setting = $this->settingRepo->find($id);
        return view('backend.settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $setting = $this->settingRepo->find($id);
        return view('backend.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'key' => 'required|string|max:255|unique:settings,key,' . $id,
            'value' => 'nullable|string',
        ]);
        $this->settingRepo->update($id, $data);
        return redirect()->route('settings.index')->with('success', 'Cập nhật cấu hình thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->settingRepo->delete($id);
        return redirect()->route('settings.index')->with('success', 'Xóa cấu hình thành công!');
    }
}
