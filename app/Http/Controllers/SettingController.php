<?php

namespace App\Http\Controllers;

use App\Repositories\SettingRepositoryInterface;
use App\Http\Requests\SettingRequest;

class SettingController extends BaseController
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
    public function store(SettingRequest $request)
    {
        $data = $request->validated();
        $this->settingRepo->create($data);
        return redirect()->route('settings.index')->with('success', $this->getCreateSuccessMessage('settings'));
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
    public function update(SettingRequest $request, $id)
    {
        $data = $request->validated();
        $this->settingRepo->update($id, $data);
        return redirect()->route('settings.index')->with('success', $this->getUpdateSuccessMessage('settings'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->settingRepo->delete($id);
        return redirect()->route('settings.index')->with('success', $this->getDeleteSuccessMessage('settings'));
    }
}
