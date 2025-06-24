@extends('layouts.master')
@section('contents')
<div class="container mt-4" style="max-width: 900px;">
    <div class="card shadow-lg border-0">
        <div class="row g-0">
            <div class="col-md-4 bg-primary text-white d-flex flex-column align-items-center justify-content-center p-4" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                @if($about->avatar)
                    <img src="{{ asset('storage/'.$about->avatar) }}" alt="avatar" class="rounded-circle mb-3 shadow" style="width: 140px; height: 140px; object-fit: cover; border: 4px solid #fff;">
                @else
                    <div class="rounded-circle bg-light mb-3" style="width: 140px; height: 140px;"></div>
                @endif
                <h3 class="mb-1">{{ $about->name }}</h3>
                <h5 class="fw-light mb-3">{{ $about->title }}</h5>
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
                @if($about->social_links && is_array($about->social_links))
                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                        @foreach($about->social_links as $social)
                            @if(!empty($social['url']))
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
                <p class="fs-5">{{ $about->summary }}</p>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <h5 class="text-secondary"><i class="bi bi-stars"></i> Kỹ năng</h5>
                        <ul class="list-group list-group-flush">
                            @foreach(explode("\n", $about->skills) as $skill)
                                @if(trim($skill) !== '')
                                    <li class="list-group-item">{{ $skill }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h5 class="text-secondary"><i class="bi bi-briefcase"></i> Kinh nghiệm</h5>
                        <ul class="list-group list-group-flush">
                            @foreach(explode("\n", $about->experience) as $exp)
                                @if(trim($exp) !== '')
                                    <li class="list-group-item">{{ $exp }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h5 class="text-secondary"><i class="bi bi-mortarboard"></i> Học vấn</h5>
                        <ul class="list-group list-group-flush">
                            @foreach(explode("\n", $about->education) as $edu)
                                @if(trim($edu) !== '')
                                    <li class="list-group-item">{{ $edu }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('abouts.edit', $about) }}" class="btn btn-warning">Chỉnh sửa</a>
                    <a href="{{ route('abouts.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 