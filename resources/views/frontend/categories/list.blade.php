@extends('layouts.layout')
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