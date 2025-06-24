<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::all();
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'summary' => 'nullable|string',
            'skills' => 'nullable|string',
            'experience' => 'nullable|string',
            'education' => 'nullable|string',
            'social_links' => 'nullable|array',
        ]);
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        if (isset($data['social_links'])) {
            $data['social_links'] = json_encode($data['social_links']);
        }
        About::create($data);
        return redirect()->route('abouts.index')->with('success', 'Tạo thông tin cá nhân thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('backend.abouts.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('backend.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'summary' => 'nullable|string',
            'skills' => 'nullable|string',
            'experience' => 'nullable|string',
            'education' => 'nullable|string',
            'social_links' => 'nullable|array',
        ]);
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
        $about->update($data);
        return redirect()->route('abouts.index')->with('success', 'Cập nhật thông tin cá nhân thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about->delete();
        return redirect()->route('abouts.index')->with('success', 'Xóa thông tin cá nhân thành công!');
    }
}
