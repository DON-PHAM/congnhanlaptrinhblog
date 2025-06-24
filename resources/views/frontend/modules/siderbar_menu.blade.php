<div class='mainMenu'>
            <div class='section' id='main-menu'>
                <div class='widget HTML' data-version='2' id='HTML000'>
                    <ul class='htmlMenu' itemscope='itemscope' itemtype='https://schema.org/SiteNavigationElement'>
                    <li>
                            <a class='link' href="{{ route('home') }}" itemprop='url'>
                                <svg class='line' viewBox='0 0 24 24'>
                                    <g transform='translate(2.500000, 2.500000)'>
                                        <line x1='6.6787' x2='12.4937' y1='12.0742685' y2='12.0742685'></line>
                                        <path
                                            d='M-1.13686838e-13,5.29836453 C-1.13686838e-13,2.85645977 1.25,0.75931691 3.622,0.272650243 C5.993,-0.214968804 7.795,-0.0463973758 9.292,0.761221672 C10.79,1.56884072 10.361,2.76122167 11.9,3.63645977 C13.44,4.51265024 15.917,3.19645977 17.535,4.94217405 C19.229,6.7697931 19.2200005,9.57550739 19.2200005,11.3640788 C19.2200005,18.1602693 15.413,18.6993169 9.61,18.6993169 C3.807,18.6993169 -1.13686838e-13,18.2288407 -1.13686838e-13,11.3640788 L-1.13686838e-13,5.29836453 Z'>
                                        </path>
                                    </g>
                                </svg>
                                <span class='name' itemprop='name'>Trang chủ</span>
                            </a>
                        </li>
                        <li>
                            <a class='link' href="{{ route('frontend.about') }}" itemprop='url'>
                                <svg class='line' viewBox='0 0 24 24'><circle cx='12' cy='7' r='4'/><path d='M5.5 21a7.5 7.5 0 0 1 13 0'/></svg>
                                <span class='name' itemprop='name'>Thông tin cá nhân</span>
                            </a>
                        </li>
                    @foreach($sidebarCategories as $category)
                        <li>
                            <a class='link' href="{{ route('frontend.categories.posts', $category->slug) }}" itemprop='url'>
                                <svg class='line' viewBox='0 0 24 24'>
                                    <g transform='translate(2.500000, 2.500000)'>
                                        <line x1='6.6787' x2='12.4937' y1='12.0742685' y2='12.0742685'></line>
                                        <path
                                            d='M-1.13686838e-13,5.29836453 C-1.13686838e-13,2.85645977 1.25,0.75931691 3.622,0.272650243 C5.993,-0.214968804 7.795,-0.0463973758 9.292,0.761221672 C10.79,1.56884072 10.361,2.76122167 11.9,3.63645977 C13.44,4.51265024 15.917,3.19645977 17.535,4.94217405 C19.229,6.7697931 19.2200005,9.57550739 19.2200005,11.3640788 C19.2200005,18.1602693 15.413,18.6993169 9.61,18.6993169 C3.807,18.6993169 -1.13686838e-13,18.2288407 -1.13686838e-13,11.3640788 L-1.13686838e-13,5.29836453 Z'>
                                        </path>
                                    </g>
                                </svg>
                                <span class='name new' itemprop='name'>{{ $category->name }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
           
            <label class='fullClose menu' for='offnav-input'></label>
        </div>
