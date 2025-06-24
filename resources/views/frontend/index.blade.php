@extends('layouts.layout')
@section('content')

                <!--[ Main content ]-->
                <main class='mainbar'>
                    <div class='section' id='top-widget'>
                        <div class='widget FeaturedPost' data-version='2' id='FeaturedPost00'>
                            <h2 class='title'>Bài viết nổi bật
                                <svg class='line' viewBox='0 0 24 24'>
                                    <path d='M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z'></path>
                                    <line x1='16' x2='2' y1='8' y2='22'></line>
                                    <line x1='17' x2='9' y1='15' y2='15'></line>
                                </svg>
                            </h2>
                            @if($featuredPost)
                            <div class='itemFeatured' role='feed'>
                                <article class='item'>
                                    <div class='itemThumbnail postThumbnail'>
                                        <a href="{{ route('frontend.posts.detail', $featuredPost->slug) }}">
                                            <img alt='{{ $featuredPost->title }}' class='imgThumb' src="{{ asset('storage/' . $featuredPost->image) }}" />
                                        </a>
                                    </div>
                                    <div class='itemContent'>
                                        <div class='postHeader'>
                                            @if($featuredPost->category)
                                            <div class='postLabel' data-text='in'>
                                                <a aria-label='{{ $featuredPost->category->name }}' data-text='{{ $featuredPost->category->name }}' href='{{ route('frontend.categories.posts', $featuredPost->category->slug) }}' rel='tag'>
                                                    {{ $featuredPost->category->name }}
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                        <h3 class='itemTitle'><a href="{{ route('frontend.posts.detail', $featuredPost->slug) }}">{{ $featuredPost->title }}</a></h3>
                                        <p class='itemEntry'>
                                            {!! $featuredPost->excerpt !!}
                                        </p>
                                        <div class='itemInfo postInfo'>
                                            <time class='postTimestamp published' datetime="{{ $featuredPost->created_at }}' title='Published: {{ $featuredPost->created_at->format('d/m/Y') }}">{{ $featuredPost->created_at->format('d/m/Y') }}</time>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            @else
                                <div class='alert alert-info'>Chưa có bài viết ghim.</div>
                            @endif
                        </div>
                    </div>
                    <div class='section' id='main-widget'>
                        <div class='widget Blog' data-version='2' id='Blog1'>
                            <div class='blogTitle'>
                                <h2 class='title'>
                                    Danh sách bài viết
                                </h2>
                                <div class='postMode' onclick='listMode()'>
                                    <svg class='line svg-1' viewBox='0 0 24 24'>
                                        <rect height='7' rx='2' ry='2' width='18' x='3' y='3'></rect>
                                        <rect height='7' rx='2' ry='2' width='18' x='3' y='14'></rect>
                                    </svg>
                                    <svg class='line svg-2' viewBox='0 0 24 24'>
                                        <rect height='7' width='7' x='3' y='3'></rect>
                                        <rect height='7' width='7' x='14' y='3'></rect>
                                        <rect height='7' width='7' x='14' y='14'></rect>
                                        <rect height='7' width='7' x='3' y='14'></rect>
                                    </svg>
                                </div>
                                <script>/*<![CDATA[*/(localStorage.getItem('list')) === 'listmode' ? document.querySelector('#mainContent').classList.add('listMode') : document.querySelector('#mainContent').classList.remove('listMode') /*]]>*/</script>
                            </div>
                            <div class='blogPosts' id="blogPosts">
                                @forelse($posts as $post)
                                <article class='hentry'>
                                    <div class='postThumbnail'>
                                        <a href="{{ route('frontend.posts.detail', $post->slug) }}">
                                            <img alt='{{ $post->title }}' class='imgThumb' src='{{ asset('storage/' . $post->image) }}' />
                                        </a>
                                    </div>
                                    <div class='postContent'>
                                        <div class='postHeader'>
                                            @if($post->category)
                                            <div class='postLabel' data-text='in'>
                                                <a aria-label='{{ $post->category->name }}' data-text='{{ $post->category->name }}' href="{{ route('frontend.categories.posts', $post->category->slug) }}" rel='tag'>
                                                    {{ $post->category->name }}
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                        <h2 class='postTitle'>
                                            <a href="{{ route('frontend.posts.detail', $post->slug) }}" rel='bookmark'>
                                                {{ $post->title }}
                                            </a>
                                        </h2>
                                        <p class='postEntry snippet'>
                                        {!! $post->excerpt !!}
                                        </p>
                                        <div class='postInfo'>
                                            <time class='postTimestamp updated' datetime="{{ $post->created_at }}'" title='Last updated: {{ $post->created_at->format('d/m/Y') }}'>{{ $post->created_at->format('d/m/Y') }}</time>
                                            <a aria-label="views" class="postComment" data-text="{{ $post->views }}" >
                                            <svg class="line" viewBox="0 0 24 24">
                                    <path d="M1 12C1 12 5 5 12 5s11 7 11 7-4 7-11 7S1 12 1 12z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                 </svg>
</a>
                                        </div>
                                    </div>
                                </article>
                                @empty
                                <div class='alert alert-info'>Chưa có bài viết nào.</div>
                                @endforelse
                            </div>
                           
                            <div class='blogPager' id='blogPager'>
                                <div class='noPost' data-text='Chưa có kết quả'></div>
                                <div class='newerLink noPost' data-text='Newest' id="loadMorePosts">
                                    <svg class='line' viewBox='0 0 24 24'>
                                        <g
                                            transform='translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) translate(5.000000, 8.500000)'>
                                            <path d='M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0'></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class='homeLink noPost'>
                                    <svg class='line' viewBox='0 0 24 24'>
                                        <g transform='translate(2.400000, 2.000000)'>
                                            <path class='fill'
                                                d='M1.24344979e-14,11.713 C1.24344979e-14,6.082 0.614,6.475 3.919,3.41 C5.365,2.246 7.615,0 9.558,0 C11.5,0 13.795,2.235 15.254,3.41 C18.559,6.475 19.172,6.082 19.172,11.713 C19.172,20 17.213,20 9.586,20 C1.959,20 1.24344979e-14,20 1.24344979e-14,11.713 Z'>
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                                <div class='olderLink noPost' data-text='Oldest'>
                                    <svg class='line' viewBox='0 0 24 24'>
                                        <g
                                            transform='translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) translate(5.000000, 8.500000)'>
                                            <path d='M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0'></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='no-items section' id='add-widget'>
                    </div>
                </main>
                <!--[ Sidebar content ]-->
                
            

@endsection

@push('scripts')
<script>
let currentPage = 1;
const perPage = 10;
const loadMoreBtn = document.getElementById('loadMorePosts');
const blogPosts = document.getElementById('blogPosts');
if(loadMoreBtn) {
    loadMoreBtn.addEventListener('click', function() {
        currentPage++;
        loadMoreBtn.disabled = true;
        loadMoreBtn.textContent = 'Đang tải...';
        fetch(`/api/posts?page=${currentPage}&per_page=${perPage}`)
            .then(res => res.json())
            .then(res => {
                if(res.data && res.data.length > 0) {
                    res.data.forEach(post => {
                        const article = document.createElement('article');
                        article.className = 'hentry';
                        article.innerHTML = `
                            <div class='postThumbnail'>
                                <a href='/post/${post.slug}'>
                                    <img alt='${post.title}' class='imgThumb' src='${post.image ?? ''}' />
                                </a>
                            </div>
                            <div class='postContent'>
                                <div class='postHeader'>
                                    ${post.category ? `<div class='postLabel' data-text='in'><a aria-label='${post.category.name}' data-text='${post.category.name}' href='/category/${post.category.slug}' rel='tag'>${post.category.name}</a></div>` : ''}
                                </div>
                                <h2 class='postTitle'>
                                    <a href='/post/${post.slug}' rel='bookmark'>${post.title}</a>
                                </h2>
                                <p class='postEntry snippet'>${post.excerpt ?? ''}</p>
                                <div class='postInfo'>
                                    <time class='postTimestamp updated' title='Last updated: ${post.created_at}'>${post.created_at}</time>
                                    <a aria-label="views" class="postComment" data-text="${post.views}" >
<svg class="line" viewBox="0 0 24 24"><g transform="translate(2.000000, 2.000000)"><path class="fill" d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path></g></svg>
</a>
                                </div>
                            </div>
                        `;
                        blogPosts.appendChild(article);
                    });
                    if(res.current_page >= res.last_page) {
                        loadMoreBtn.style.display = 'none';
                    } else {
                        loadMoreBtn.disabled = false;
                        loadMoreBtn.textContent = 'Tải thêm bài viết';
                    }
                } else {
                    loadMoreBtn.style.display = 'none';
                }
            })
            .catch(() => {
                loadMoreBtn.disabled = false;
                loadMoreBtn.textContent = 'Tải thêm bài viết';
            });
    });
}
</script>
@endpush

@push('seo')
{!! \App\Helpers\SeoHelper::generateHtmlMetaTags((object)[
    'meta_title' => config('app.name', 'Công nhân lập trình'),
    'title' => config('app.name', 'Công nhân lập trình'),
    'meta_description' => config('app.description', 'Blog chia sẻ kiến thức lập trình, công nghệ, phát triển bản thân.'),
    'excerpt' => config('app.description', 'Blog chia sẻ kiến thức lập trình, công nghệ, phát triển bản thân.'),
    'meta_keywords' => 'blog, lập trình, công nghệ, phát triển bản thân',
    'og_title' => config('app.name', 'Công nhân lập trình'),
    'og_description' => config('app.description', 'Blog chia sẻ kiến thức lập trình, công nghệ, phát triển bản thân.'),
    'og_image' => asset(config('app.logo', 'backend/assets/img/AdminLTELogo.png')),
    'slug' => '',
    'image' => asset(config('app.logo', 'backend/assets/img/AdminLTELogo.png')),
    'twitter_title' => config('app.name', 'Công nhân lập trình'),
    'twitter_description' => config('app.description', 'Blog chia sẻ kiến thức lập trình, công nghệ, phát triển bản thân.'),
    'twitter_image' => asset(config('app.logo', 'backend/assets/img/AdminLTELogo.png')),
    'created_at' => now(),
    'updated_at' => now(),
    'user' => null,
    'category' => null
]) !!}
@endpush