@extends('layouts.layout')

@section('title', 'Danh mục bài viết - Công nhân lập trình')

@push('seo')
    <title>Danh mục bài viết - Công nhân lập trình</title>
    <meta name="description" content="Khám phá tất cả các danh mục bài viết về lập trình, công nghệ và phát triển bản thân." />
    <meta name="keywords" content="danh mục, categories, lập trình, công nghệ, blog" />
    
    <!-- Open Graph -->
    <meta property="og:title" content="Danh mục bài viết - Công nhân lập trình" />
    <meta property="og:description" content="Khám phá tất cả các danh mục bài viết về lập trình, công nghệ và phát triển bản thân." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/categories') }}" />
    <meta property="og:image" content="{{ asset('backend/assets/img/AdminLTELogo.png') }}" />
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Danh mục bài viết - Công nhân lập trình" />
    <meta name="twitter:description" content="Khám phá tất cả các danh mục bài viết về lập trình, công nghệ và phát triển bản thân." />
    <meta name="twitter:image" content="{{ asset('backend/assets/img/AdminLTELogo.png') }}" />
@endpush

@section('content')
<main class='mainbar'>
<div class="container mt-4">
    <h2>Danh mục</h2>
    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('frontend.categories.posts', $category->slug) }}">{{ $category->name }}</a>
                        </h5>
                        <p class="card-text">{{ $category->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</main>
@endsection 