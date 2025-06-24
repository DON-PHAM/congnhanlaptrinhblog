@extends('layouts.layout')
@section('content')
<main class="mainbar">
    <div class="container mt-4">
        <h2>Kết quả tìm kiếm cho: <span class="text-primary">{{ $q }}</span></h2>
        @if($posts->count())
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('frontend.posts.detail', $post->slug) }}">{{ $post->title }}</a>
                                </h5>
                                <p class="card-text">{!! $post->excerpt !!}</p>
                                <div class="text-muted small">{{ $post->created_at->format('d/m/Y') }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">Không tìm thấy bài viết nào phù hợp.</div>
        @endif
    </div>
</main>
@endsection

@push('seo')
{!! \App\Helpers\SeoHelper::generateHtmlMetaTags((object)[
    'meta_title' => 'Tìm kiếm: ' . $q,
    'title' => 'Tìm kiếm: ' . $q,
    'meta_description' => 'Kết quả tìm kiếm cho từ khóa: ' . $q,
    'excerpt' => 'Kết quả tìm kiếm cho từ khóa: ' . $q,
    'meta_keywords' => $q,
    'og_title' => 'Tìm kiếm: ' . $q,
    'og_description' => 'Kết quả tìm kiếm cho từ khóa: ' . $q,
    'og_image' => null,
    'slug' => '',
    'image' => null,
    'twitter_title' => 'Tìm kiếm: ' . $q,
    'twitter_description' => 'Kết quả tìm kiếm cho từ khóa: ' . $q,
    'twitter_image' => null,
    'created_at' => now(),
    'updated_at' => now(),
    'user' => null,
    'category' => null
]) !!}
@endpush 