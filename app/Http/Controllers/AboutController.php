<?php

namespace App\Http\Controllers;

use App\Repositories\AboutRepositoryInterface;
use App\Http\Requests\AboutRequest;
use Illuminate\Support\Facades\Storage;

class AboutController extends BaseController
{
    protected $aboutRepo;

    public function __construct(AboutRepositoryInterface $aboutRepo)
    {
        $this->aboutRepo = $aboutRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = $this->aboutRepo->all();
        return view('backend.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        if (isset($data['social_links'])) {
            $data['social_links'] = json_encode($data['social_links']);
        }
        $this->aboutRepo->create($data);
        return redirect()->route('abouts.index')->with('success', $this->getCreateSuccessMessage('abouts'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $about = $this->aboutRepo->find($id);
        return view('backend.abouts.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $about = $this->aboutRepo->find($id);
        return view('backend.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request, $id)
    {
        $about = $this->aboutRepo->find($id);
        $data = $request->validated();
        if ($request->hasFile('avatar')) {
            // Xóa avatar cũ nếu có
            if ($about->avatar && Storage::disk('public')->exists($about->avatar)) {
                Storage::disk('public')->delete($about->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        if (isset($data['social_links'])) {
            $data['social_links'] = json_encode($data['social_links']);
        }
        $this->aboutRepo->update($id, $data);
        return redirect()->route('abouts.index')->with('success', $this->getUpdateSuccessMessage('abouts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->aboutRepo->delete($id);
        return redirect()->route('abouts.index')->with('success', $this->getDeleteSuccessMessage('abouts'));
    }

    /**
     * Hiển thị trang about ở frontend
     */
    public function aboutFrontend()
    {
        $about = $this->aboutRepo->first();
        return view('frontend.about.index', compact('about'));
    }
}
