@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Chi tiết bài viết</h2>
    
    <!-- Nav tabs -->
    <ul class="nav nav-tabs mb-3" id="postTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="content-tab" data-bs-toggle="tab" data-bs-target="#content" type="button" role="tab">Nội dung</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo" type="button" role="tab">SEO</button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content" id="postTabsContent">
        <!-- Content Tab -->
        <div class="tab-pane fade show active" id="content" role="tabpanel">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text"><strong>Slug:</strong> {{ $post->slug }}</p>
                    <p class="card-text"><strong>Mô tả ngắn:</strong> {{ $post->excerpt }}</p>
                    @if($post->image)
                        <p class="card-text"><strong>Hình ảnh:</strong><br><img src="{{ asset('storage/'.$post->image) }}" alt="Ảnh bài viết" style="max-width:200px;"></p>
                    @endif
                    <p class="card-text"><strong>Danh mục:</strong> {{ optional($post->category)->name }}</p>
                    <p class="card-text"><strong>Tác giả:</strong> {{ optional($post->user)->name }}</p>
                    <p class="card-text"><strong>Nội dung:</strong><br> {!! nl2br(e($post->content)) !!}</p>
                    <p class="card-text"><strong>Nổi bật:</strong> {!! $post->is_featured ? '<span class=\'badge bg-success\'>Nổi bật</span>' : '' !!}</p>
                    <p class="card-text"><strong>Lượt xem:</strong> {{ $post->views }}</p>
                    <p class="card-text"><strong>Trạng thái:</strong> {{ $post->status }}</p>
                    <p class="card-text"><strong>Ngày tạo:</strong> {{ $post->created_at->format('d/m/Y H:i:s') }}</p>
                    <p class="card-text"><strong>Ngày cập nhật:</strong> {{ $post->updated_at->format('d/m/Y H:i:s') }}</p>
                </div>
            </div>
        </div>

        <!-- SEO Tab -->
        <div class="tab-pane fade" id="seo" role="tabpanel">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Meta Tags</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Meta Title:</strong> {{ $post->meta_title ?: 'Chưa có' }}</p>
                            <p><strong>Meta Description:</strong> {{ $post->meta_description ?: 'Chưa có' }}</p>
                            <p><strong>Meta Keywords:</strong> {{ $post->meta_keywords ?: 'Chưa có' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Open Graph</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>OG Title:</strong> {{ $post->og_title ?: 'Chưa có' }}</p>
                            <p><strong>OG Description:</strong> {{ $post->og_description ?: 'Chưa có' }}</p>
                            <p><strong>OG Image:</strong> {{ $post->og_image ?: 'Chưa có' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Twitter Card</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Twitter Title:</strong> {{ $post->twitter_title ?: 'Chưa có' }}</p>
                            <p><strong>Twitter Description:</strong> {{ $post->twitter_description ?: 'Chưa có' }}</p>
                            <p><strong>Twitter Image:</strong> {{ $post->twitter_image ?: 'Chưa có' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Sửa</a>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
</div>
@endsection 