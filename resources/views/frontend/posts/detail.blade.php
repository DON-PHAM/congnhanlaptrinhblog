@extends('layouts.layout')

@section('title', $post->meta_title ?: $post->title . ' - Công nhân lập trình')

@section('content')

<main class="mainbar">

<div class="breadcrumbs" itemscope="itemscope" itemtype="https://schema.org/BreadcrumbList">
    <div class="homeLink" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a href="/" itemprop="item"><span itemprop="name">Trang chủ</span></a>
        <meta content="1" itemprop="position">
    </div>
    @if($post->category)
    <div class="labelLink" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a href="{{ route('frontend.categories.posts', $post->category->slug) }}" itemprop="item"><span itemprop="name">{{ $post->category->name }}</span></a>
        <meta content="2" itemprop="position">
    </div>
    @endif
    <div class="labelLink" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name">{{ $post->title }}</span>
        <meta content="3" itemprop="position">
    </div>
</div>

<div class="container mt-4">
    @if($post->user)
    <div class="d-flex align-items-center mb-4 p-3 bg-white rounded-4 shadow author-box" style="border: 1.5px solid #e3e6ed;">
        <img src="{{ asset('backend/assets/img/avatar.png') }}" alt="Avatar" class="rounded-circle border border-3 border-primary" style="width:30px; height:30px; object-fit:cover;">
        <div class="ms-3 d-flex flex-column justify-content-center">
            <span class="fw-bold fs-5 d-flex align-items-center mb-1">
                <i class="bi bi-person-circle me-2 text-primary"></i> {{ $post->user->name }}
            </span>
        </div>
    </div>
    @endif
    <h1>{{ $post->title }}</h1>
    <div class="mb-2 text-muted">
        Đăng ngày {{ $post->created_at->format('d/m/Y') }}
        @if($post->category)
            | <a href="{{ route('frontend.categories.posts', $post->category->slug) }}">{{ $post->category->name }}</a>
        @endif
    </div>
    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mb-3" alt="{{ $post->title }}">
    @endif
    <div class="mb-3">
        {!! $post->content !!}
    </div>
    @if($post->tags->count())
        <div>
            @foreach($post->tags as $tag)
                <a href="#" class="badge bg-primary text-decoration-none me-1">{{ $tag->name }}</a>
            @endforeach
        </div>
    @endif
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Quay lại</a>
</div>
</main>
@push('seo')
{!! \App\Helpers\SeoHelper::generateHtmlMetaTags($post, false) !!}
@endpush
@push('scripts')
<script>
(function() {
    var postId = {{ $post->id }};
    var viewKey = 'post_viewed_' + postId;
    var lastViewed = localStorage.getItem(viewKey);
    var now = Date.now();
    var FIFTEEN_MINUTES = 15 * 60 * 1000;
    if (!lastViewed || now - parseInt(lastViewed) > FIFTEEN_MINUTES) {
        fetch('/post/' + postId + '/view', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        }).then(function(res) {
            localStorage.setItem(viewKey, now.toString());
        });
    }
})();
</script>
@endpush
@endsection 