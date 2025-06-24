@extends('layouts.layout')
@section('content')

@push('seo')
{!! \App\Helpers\SeoHelper::generateHtmlMetaTags((object)[
    'meta_title' => $category->name,
    'title' => $category->name,
    'meta_description' => $category->description,
    'excerpt' => $category->description,
    'meta_keywords' => $category->name,
    'og_title' => $category->name,
    'og_description' => $category->description,
    'og_image' => null,
    'slug' => $category->slug,
    'image' => null,
    'twitter_title' => $category->name,
    'twitter_description' => $category->description,
    'twitter_image' => null,
    'created_at' => now(),
    'updated_at' => now(),
    'user' => null,
    'category' => $category
]) !!}
@endpush

<main class="mainbar">
   <div class="section" id="main-widget">
      <div class="widget Blog" data-version="2" id="Blog1">
         <div class="blogTitle">
            <h2 class="title search">
               <a href="/categories" class="home" data-text="Danh mục">Danh mục</a>
               <span> / </span>
               <span class="current-category">{{ $category->name }}</span>
            </h2>
           
            <div class="postMode" onclick="listMode()">
               <svg class="line svg-1" viewBox="0 0 24 24">
                  <rect height="7" rx="2" ry="2" style="fill: rgb(128 138 157 / 47%);stroke: none;" transform="translate(1.000000, 1.400000)" width="18" x="3" y="3"></rect>
                  <rect height="7" rx="2" ry="2" style="fill: rgb(128 138 157 / 47%);stroke: none;" transform="translate(1.000000, 1.400000)" width="18" x="3" y="14"></rect>
                  <rect height="7" rx="2" ry="2" width="18" x="3" y="3"></rect>
                  <rect height="7" rx="2" ry="2" width="18" x="3" y="14"></rect>
               </svg>
               <svg class="line svg-2" viewBox="0 0 24 24">
                  <rect height="7" style="fill: rgb(128 138 157 / 47%);stroke: none;" transform="translate(1.000000, 1.400000)" width="7" x="3" y="3"></rect>
                  <rect height="7" style="fill: rgb(128 138 157 / 47%);stroke: none;" transform="translate(1.000000, 1.400000)" width="7" x="14" y="3"></rect>
                  <rect height="7" style="fill: rgb(128 138 157 / 47%);stroke: none;" transform="translate(1.000000, 1.400000)" width="7" x="14" y="14"></rect>
                  <rect height="7" style="fill: rgb(128 138 157 / 47%);stroke: none;" transform="translate(1.000000, 1.400000)" width="7" x="3" y="14"></rect>
                  <rect height="7" width="7" x="3" y="3"></rect>
                  <rect height="7" width="7" x="14" y="3"></rect>
                  <rect height="7" width="7" x="14" y="14"></rect>
                  <rect height="7" width="7" x="3" y="14"></rect>
               </svg>
            </div>
            <script>/*<![CDATA[*/ (localStorage.getItem('list')) === 'listmode' ? document.querySelector('#mainContent').classList.add('listMode') : document.querySelector('#mainContent').classList.remove('listMode') /*]]>*/</script>
         </div>
         <div class="blogPosts">
         @if($posts->count())
         @foreach($posts as $post)
            <article class="hentry">
               <div class="postThumbnail">
                  <a href="{{ route('frontend.posts.detail', $post->slug) }}">
                  @if($post->image)
                      <img alt="{{ $post->title }}" class="imgThumb" src="{{ asset('storage/' . $post->image) }}">
                  @else
                      <img alt="{{ $post->title }}" class="imgThumb" src="/backend/assets/img/default-150x150.png">
                  @endif
                  </a>
               </div>
               <div class="postContent">
                  <div class="postHeader">
                  @if($post->tags->count())
                      <div class="mb-2">
                          @foreach($post->tags as $tag)
                              <a href="#" class="badge bg-primary text-decoration-none me-1">In {{ $tag->name }}</a>
                          @endforeach
                      </div>
                  @endif
                  </div>
                  <h2 class="postTitle">
                     <a data-text="Cách Tạo Trang Chuyển Hướng Safelink Mã Hoá URL Cho Blog" href="{{ route('frontend.posts.detail', $post->slug) }}" rel="bookmark">
                     {{ $post->title }}
                     </a>
                  </h2>
                 
                  <p class="postEntry snippet">
                     {!! $post->excerpt !!}
                  </p>
                  <div class="postInfo">
                     <time class="postTimestamp published" data-text="{{ $post->created_at->format('d/m/Y') }}" datetime="{{ $post->created_at->format('d/m/Y') }}" title="{{ $post->created_at->format('d/m/Y') }}"></time>
                     <a aria-label="Comments" class="postComment" data-text="7" href="">
                     <svg class="line" viewBox="0 0 24 24">
                                    <path d="M1 12C1 12 5 5 12 5s11 7 11 7-4 7-11 7S1 12 1 12z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                 </svg>
                     </a>
                  </div>
               </div>
            </article>
            @endforeach
            @else
        <p>Chưa có bài viết nào trong danh mục này.</p>
    @endif
         </div>
         {{ $posts->links() }}
      </div>
   </div>
   <div class="no-items section" id="add-widget"></div>
</main>

@endsection 