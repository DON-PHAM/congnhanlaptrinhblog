<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userRepo->paginate(15);
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string',
        ]);
        $data['password'] = Hash::make($data['password']);
        $this->userRepo->create($data);
        return redirect()->route('users.index')->with('success', 'Tạo tài khoản thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = $this->userRepo->find($id);
        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = $this->userRepo->find($id);
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = $this->userRepo->find($id);
        if ($user->isSupperAdmin() && auth()->id() !== $user->id) {
            return redirect()->route('users.index')->with('error', 'Không thể sửa tài khoản supperadmin!');
        }
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|string',
        ]);
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $this->userRepo->update($id, $data);
        return redirect()->route('users.index')->with('success', 'Cập nhật tài khoản thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = $this->userRepo->find($id);
        if ($user->isSupperAdmin()) {
            return redirect()->route('users.index')->with('error', 'Không thể xóa tài khoản supperadmin!');
        }
        $this->userRepo->delete($id);
        return redirect()->route('users.index')->with('success', 'Xóa tài khoản thành công!');
    }
}
