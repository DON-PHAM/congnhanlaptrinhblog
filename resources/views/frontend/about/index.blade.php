@php use Illuminate\Support\Str; @endphp
@extends('layouts.layout')

@section('title', 'Về tôi - ' . ($about->name ?? 'Công nhân lập trình'))

@push('seo')
    <title>Về tôi - {{ $about->name ?? 'Công nhân lập trình' }}</title>
    <meta name="description" content="{{ $about->summary ?? 'Thông tin cá nhân và kinh nghiệm làm việc trong lĩnh vực lập trình và công nghệ.' }}" />
    <meta name="keywords" content="{{ $about->name ?? 'lập trình viên' }}, developer, programmer, {{ $about->title ?? 'công nghệ' }}" />
    
    <!-- Open Graph -->
    <meta property="og:title" content="Về tôi - {{ $about->name ?? 'Công nhân lập trình' }}" />
    <meta property="og:description" content="{{ $about->summary ?? 'Thông tin cá nhân và kinh nghiệm làm việc trong lĩnh vực lập trình và công nghệ.' }}" />
    <meta property="og:type" content="profile" />
    <meta property="og:url" content="{{ url('/about') }}" />
    @if($about && $about->avatar)
        <meta property="og:image" content="{{ asset('storage/' . $about->avatar) }}" />
    @endif
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Về tôi - {{ $about->name ?? 'Công nhân lập trình' }}" />
    <meta name="twitter:description" content="{{ $about->summary ?? 'Thông tin cá nhân và kinh nghiệm làm việc trong lĩnh vực lập trình và công nghệ.' }}" />
    @if($about && $about->avatar)
        <meta name="twitter:image" content="{{ asset('storage/' . $about->avatar) }}" />
    @endif
@endpush

@section('content')
<main class="mainbar">
<div class="container mt-4" style="max-width: 900px;">
    @if($about)
        <div class="card shadow-lg border-0">
            <div class="row g-0">
                <div class="col-md-4 bg-primary text-white d-flex flex-column align-items-center justify-content-center p-4" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    @if($about->avatar)
                        <img src="{{ asset('storage/'.$about->avatar) }}" alt="avatar" class="rounded-circle mb-3 shadow" style="width: 140px; height: 140px; object-fit: cover; border: 4px solid #fff;">
                    @else
                        <div class="rounded-circle bg-light mb-3 d-flex align-items-center justify-content-center" style="width: 140px; height: 140px;">
                            <i class="bi bi-person text-muted" style="font-size: 3rem;"></i>
                        </div>
                    @endif
                    <h3 class="mb-1">{{ $about->name ?? 'Chưa có tên' }}</h3>
                    <h5 class="fw-light mb-3">{{ $about->title ?? 'Chưa có chức danh' }}</h5>
                    <ul class="list-unstyled mb-3">
                        @if($about->email)
                            <li><i class="bi bi-envelope"></i> {{ $about->email }}</li>
                        @endif
                        @if($about->phone)
                            <li><i class="bi bi-telephone"></i> {{ $about->phone }}</li>
                        @endif
                        @if($about->address)
                            <li><i class="bi bi-geo-alt"></i> {{ $about->address }}</li>
                        @endif
                        @if($about->birthday)
                            <li><i class="bi bi-cake"></i> {{ $about->birthday->format('d/m/Y') }}</li>
                        @endif
                    </ul>
                    @if($about->social_links && is_array($about->social_links) && count($about->social_links) > 0)
                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            @foreach($about->social_links as $social)
                                @if(is_array($social) && !empty($social['url']))
                                    <a href="{{ $social['url'] }}" target="_blank" class="btn btn-light btn-sm rounded-pill shadow-sm px-3">
                                        <i class="bi bi-link-45deg"></i> {{ $social['name'] ?? 'Social' }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-md-8 p-4">
                    <h4 class="mb-3 text-primary">Giới thiệu</h4>
                    <p class="fs-5">{{ $about->summary ?? 'Chưa có thông tin giới thiệu' }}</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h5 class="text-secondary"><i class="bi bi-stars"></i> Kỹ năng</h5>
                            @if($about->skills)
                                <ul class="list-group list-group-flush">
                                    @foreach(explode("\n", $about->skills) as $skill)
                                        @if(trim($skill) !== '')
                                            <li class="list-group-item">{{ $skill }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted">Chưa có thông tin kỹ năng</p>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5 class="text-secondary"><i class="bi bi-briefcase"></i> Kinh nghiệm</h5>
                            @if($about->experience)
                                <ul class="list-group list-group-flush">
                                    @foreach(explode("\n", $about->experience) as $exp)
                                        @if(trim($exp) !== '')
                                            <li class="list-group-item">{{ $exp }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted">Chưa có thông tin kinh nghiệm</p>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h5 class="text-secondary"><i class="bi bi-mortarboard"></i> Học vấn</h5>
                            @if($about->education)
                                <ul class="list-group list-group-flush">
                                    @foreach(explode("\n", $about->education) as $edu)
                                        @if(trim($edu) !== '')
                                            <li class="list-group-item">{{ $edu }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted">Chưa có thông tin học vấn</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card shadow-lg border-0">
            <div class="card-body text-center py-5">
                <i class="bi bi-person-x text-muted" style="font-size: 4rem;"></i>
                <h3 class="mt-3 text-muted">Chưa có thông tin cá nhân</h3>
                <p class="text-muted">Vui lòng liên hệ quản trị viên để cập nhật thông tin.</p>
                @auth
                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'supperadmin')
                        <a href="{{ route('abouts.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tạo thông tin cá nhân
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    @endif
</div>
</main>
@endsection 