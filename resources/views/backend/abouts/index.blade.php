@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Thông tin cá nhân</h2>
    @if($abouts->count() === 0)
        <div class="alert alert-info">Bạn chưa có thông tin cá nhân. <a href="{{ route('abouts.create') }}" class="btn btn-primary btn-sm">Tạo mới</a></div>
    @else
        @php $about = $abouts->first(); @endphp
        <div class="card mb-3" style="max-width: 700px;">
            <div class="row g-0">
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    @if($about->avatar)
                        <img src="{{ asset('storage/'.$about->avatar) }}" class="img-fluid rounded-circle m-3" style="width: 120px; height: 120px; object-fit: cover;" alt="Avatar">
                    @else
                        <div class="bg-secondary rounded-circle m-3" style="width: 120px; height: 120px;"></div>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title mb-1">{{ $about->name }}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $about->title }}</h6>
                        <p class="mb-1"><strong>Email:</strong> {{ $about->email }}</p>
                        <p class="mb-1"><strong>Điện thoại:</strong> {{ $about->phone }}</p>
                        <p class="mb-1"><strong>Địa chỉ:</strong> {{ $about->address }}</p>
                        <p class="mb-1"><strong>Ngày sinh:</strong> {{ $about->birthday ? $about->birthday->format('d/m/Y') : '' }}</p>
                        <a href="{{ route('abouts.show', $about) }}" class="btn btn-info btn-sm">Xem chi tiết</a>
                        <a href="{{ route('abouts.edit', $about) }}" class="btn btn-warning btn-sm">Sửa</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection 