@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Chi tiết bình luận</h2>
    
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Bình luận #{{ $comment->id }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Bài viết:</strong> 
                        <a href="{{ route('posts.show', $comment->post_id) }}" target="_blank">
                            {{ $comment->post->title ?? 'N/A' }}
                        </a>
                    </p>
                    <p><strong>Người bình luận:</strong> {{ $comment->user->name ?? 'N/A' }}</p>
                    <p><strong>Email:</strong> {{ $comment->user->email ?? 'N/A' }}</p>
                    <p><strong>Loại:</strong> 
                        @if($comment->parent)
                            <span class="badge bg-info">Reply</span>
                        @else
                            <span class="badge bg-primary">Comment</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    <p><strong>Thời gian tạo:</strong> {{ $comment->created_at->format('d/m/Y H:i:s') }}</p>
                    <p><strong>Cập nhật lần cuối:</strong> {{ $comment->updated_at->format('d/m/Y H:i:s') }}</p>
                    @if($comment->parent)
                        <p><strong>Bình luận cha:</strong> 
                            <a href="{{ route('comments.show', $comment->parent) }}">
                                #{{ $comment->parent->id }}
                            </a>
                        </p>
                    @endif
                </div>
            </div>
            
            <hr>
            
            <div class="mb-3">
                <strong>Nội dung:</strong>
                <div class="mt-2 p-3 bg-light rounded">
                    {!! nl2br(e($comment->content)) !!}
                </div>
            </div>
            
            @if($comment->replies->count() > 0)
                <div class="mb-3">
                    <strong>Replies ({{ $comment->replies->count() }}):</strong>
                    <div class="mt-2">
                        @foreach($comment->replies as $reply)
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>{{ $reply->user->name }}</strong>
                                            <small class="text-muted">{{ $reply->created_at->format('d/m/Y H:i') }}</small>
                                        </div>
                                        <div>
                                            <a href="{{ route('comments.show', $reply) }}" class="btn btn-info btn-sm">Xem</a>
                                            <a href="{{ route('comments.edit', $reply) }}" class="btn btn-warning btn-sm">Sửa</a>
                                        </div>
                                    </div>
                                    <p class="mb-0 mt-2">{{ Str::limit($reply->content, 100) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('comments.edit', $comment) }}" class="btn btn-warning">Sửa</a>
            <a href="{{ route('comments.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection 