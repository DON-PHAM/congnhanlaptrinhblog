<aside class="sidebar">
   <div class="section" id="side-widget">
      <div class="widget PopularPosts" data-version="2" id="PopularPosts00">
         <h2 class="title">Bài viết mới nhất</h2>
         <div class="widget-content">
            <div class="itemPopulars" role="feed">
            @foreach($sidebarLatestPosts as $post)
               <article class="itemPopular noImage">
                  <div class="itemContent">
                     <div class="postHeader">
                        <div class="postLabel" data-text="in">
                           <a aria-label="Fullpage" data-text="Fullpage" href="{{ route('frontend.posts.detail', $post->slug) }}" rel="tag">
                           </a>
                           <a aria-label="Liên Kết" data-text="Liên Kết" href="{{ route('frontend.posts.detail', $post->slug) }}" rel="tag">
                           </a>
                        </div>
                     </div>
                     <div class="itemInner">
                        <div class="itemFlex">
                           <h3 class="itemTitle"><a href="{{ route('frontend.posts.detail', $post->slug) }}">{{ $post->title }}</a></h3>
                           <div class="itemInfo postInfo">
                              <time class="postTimestamp updated" data-text="{{ $post->created_at->format('d/m/Y') }}" datetime="{{ $post->created_at->format('d/m/Y') }}" title="{{ $post->created_at->format('d/m/Y') }}"></time>
                              <a aria-label="Comments" class="postComment" data-text="{{ $post->views }}" href="">
                                 <svg class="line" viewBox="0 0 24 24">
                                    <path d="M1 12C1 12 5 5 12 5s11 7 11 7-4 7-11 7S1 12 1 12z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                 </svg>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </article>
               @endforeach
            </div>
         </div>
      </div>
      <div class="widget Label" data-version="2" id="Label00">
         <h3 class="title">
            Tags
         </h3>
         <div class="widgetContent list">
            <ul>
               @foreach($sidebarTags as $tag)
               <li>
                  <a aria-label="{{ $tag->name }}" class="labelName" href="#">
                     <span class="labelTitle">{{ $tag->name }}</span>
                     <span class="labelCount">{{ $tag->posts_count }}</span>
                  </a>
               </li>
               @endforeach
            </ul>
         </div>
      </div>
   </div>
   <!--[ Sidebar sticky ]-->
   <div class="section" id="side-sticky">
      <div class="widget HTML" data-version="2" id="HTML07">
         <div class="widget-content"></div>
      </div>
   </div>
</aside>