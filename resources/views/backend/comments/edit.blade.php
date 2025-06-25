@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Sửa bình luận</h2>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('comments.update', $comment) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung bình luận <span class="text-danger">*</span></label>
                    <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $comment->content) }}</textarea>
                    @error('content')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Thông tin bình luận</label>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Bài viết:</strong> {{ $comment->post->title ?? 'N/A' }}</p>
                            <p><strong>Người bình luận:</strong> {{ $comment->user->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Thời gian tạo:</strong> {{ $comment->created_at->format('d/m/Y H:i:s') }}</p>
                            <p><strong>Loại:</strong> 
                                @if($comment->parent)
                                    <span class="badge bg-info">Reply</span>
                                @else
                                    <span class="badge bg-primary">Comment</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('comments.index') }}" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection 