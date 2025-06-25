@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Thêm bình luận mới</h2>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="post_id" class="form-label">Bài viết <span class="text-danger">*</span></label>
                    <select name="post_id" id="post_id" class="form-control" required>
                        <option value="">-- Chọn bài viết --</option>
                        @foreach(\App\Models\Post::all() as $post)
                            <option value="{{ $post->id }}" {{ old('post_id') == $post->id ? 'selected' : '' }}>
                                {{ $post->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('post_id')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                
                <div class="mb-3">
                    <label for="user_id" class="form-label">Người bình luận <span class="text-danger">*</span></label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        <option value="">-- Chọn người dùng --</option>
                        @foreach(\App\Models\User::all() as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                
                <div class="mb-3">
                    <label for="parent_id" class="form-label">Bình luận cha (nếu là reply)</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="">-- Không có (comment gốc) --</option>
                        @foreach(\App\Models\Comment::whereNull('parent_id')->get() as $parentComment)
                            <option value="{{ $parentComment->id }}" {{ old('parent_id') == $parentComment->id ? 'selected' : '' }}>
                                #{{ $parentComment->id }} - {{ Str::limit($parentComment->content, 50) }}
                            </option>
                        @endforeach
                    </select>
                    @error('parent_id')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                
                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung bình luận <span class="text-danger">*</span></label>
                    <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
                    @error('content')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Tạo bình luận</button>
                <a href="{{ route('comments.index') }}" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection 