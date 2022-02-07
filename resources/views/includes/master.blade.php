<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap"/>
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.13.0/css/pro.min.css"/>
    <link rel="shortcut icon" type="image/png" href="{{ asset('site_assets/images/fav.png') }}"/>
    <!--build:css site_assets/css/styles.min.css-->
    <link rel="stylesheet" href="{{ asset('site_assets/css/elegant.css') }}"/>
    <link rel="stylesheet" href="{{ asset('site_assets/css/custom_bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('site_assets/css/slick.css') }}"/>
    <link rel="stylesheet" href="{{ asset('site_assets/css/plyr.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('site_assets/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('site_assets/css/custom.css') }}"/>
    <link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/styles/default.min.css">
    <!--endbuild-->
  </head>
  <body>
    <div id="load">
      <div class="load__content">
        <div class="load__icon"><img src="{{ asset('site_assets/images/icons/load.gif') }}" alt="Loading icon"/></div>
      </div>
    </div>
    <header class="theme-default">
      <div id="search-box">
        <div class="container">
          <form action="/" method="POST">
            <input type="text" placeholder="Searching for news" name="search"/>
            <button><i class="fas fa-arrow-right"></i></button>
          </form>
        </div>
      </div>
      <div class="container">
        <div class="header-wrapper"><a class="header__logo" href="{{ url('/') }}"><img src="{{ asset('site_assets/images/logo.png') }}" alt="Logo"/></a>
          <nav>
            <ul>
              <li class="nav-item {{ Request()->is('/') ? 'active': '' }}"><a href="{{ url('/') }}">Home</a> </li>
              <li class="nav-item {{ Request()->is('about') ? 'active': '' }}"><a href="{{ route('about') }}">About</a></li>
              <li class="nav-item {{ Request()->is('contact') ? 'active': '' }}"><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
          </nav>
          <div class="header__icon-group">
            <a href="#" id="search"><i class="fas fa-search"></i></a>
            <div class="social">
              @foreach ($getActiveSocialMedia as $item) 
                <a href="{{ $item->social_url }}"><i class="{{ $item->icon_class }}"></i></a>
              @endforeach
              <a id="mobile-menu-controller" href="#"><i class="fas fa-bars"></i></a>
            </div>
          </div>
        </div>
      </div>
    </header>

    @yield('MainContent')

    <footer>
        <div class="container">
          <div class="footer-content">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-4">
                <div class="footer-col -about">
                  <div class="center-line-title"> 
                    <h5>About us</h5>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida lacus vel facilisis. </p>
                  <div class="contact-method">
                    <p> <i class="fas fa-map-marker-alt"></i>5 South Main Street Los Angeles, ZZ-96110 USA</p>
                    <p> <i class="far fa-mobile-android"></i>125-711-811   |   125-668-886</p>
                    <p> <i class="fas fa-headphones-alt"></i>Support.hosting@gmail.com</p>
                  </div>
                </div>
              </div>
              @if($featurePost)
              <div class="col-12 col-md-6 col-lg-4">
                <div class="footer-col -feature-post">
                  <div class="center-line-title"> 
                    <h5>Feature posts</h5>
                  </div>
                  <div class="feature-post-block">
                    @foreach($featurePost as $feature)
                    <div class="post-card -tiny">
                      <a class="card__cover" href="/post/{{ $feature->slug }}">
                        <img src="{{ asset('uploads/posts/'.$feature->post_thumbnail) }}" alt="{{ $feature->title }}"/>
                      </a>
                      <div class="card__content">
                        <h5 class="card__content-category">{{ $feature->category }}</h5>
                        <a class="card__content-title" href="/post/{{ $feature->slug }}">{{ $feature->title }}</a>
                        <div class="card__content-info">
                          <div class="info__time"><i class="far fa-clock"></i>
                            <p>{{ $feature->created_at->diffForHumans() }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              @endif
              <div class="col-12 col-md-12 col-lg-4">
                <div class="footer-col -util">
                  <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                      <div class="center-line-title"> 
                        <h5>Tag clouds</h5>
                      </div>
                      <div class="tags-group"><a class="tag-btn" href="blog_category_grid.html">Gutenews</a><a class="tag-btn" href="blog_category_grid.html">Lifestyle</a><a class="tag-btn" href="blog_category_grid.html">Fashion</a><a class="tag-btn" href="blog_category_grid.html">Technology</a><a class="tag-btn" href="blog_category_grid.html">Food</a><a class="tag-btn" href="blog_category_grid.html">Travel</a>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-12">
                      <div class="center-line-title"> 
                        <h5>Follow us</h5>
                      </div>
                      @if($getActiveSocialMedia)
                      <div class="social-block">
                        @foreach ($getActiveSocialMedia as $social_item)
                          <a target="_blank" href="{{ $social_item->social_url }}"><i class="{{ $social_item->icon_class }}"></i></a>
                        @endforeach
                       
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="copyright">
            <p>© 2019, GuteNews - News Magazine WordPress Theme. All rights reserved.</p>
          </div>
        </div>
      </footer>
      <!--build:js site_assets/js/main.min.js-->
      <script rel="script/javascript" src="{{ asset('site_assets/js/jquery.min.js') }}"></script>
      <script rel="script/javascript" src="{{ asset('site_assets/js/slick.min.js') }}"></script>
      <script rel="script/javascript" src="{{ asset('site_assets/js/plyr.min.js') }}"></script>
      <script rel="script/javascript" src="{{ asset('site_assets/js/masonry.pkgd.min.js') }}"></script>
      <script rel="script/javascript" src="{{ asset('site_assets/js/imagesloaded.pkgd.min.js') }}"></script>
      <script rel="script/javascript" src="{{ asset('site_assets/js/vimeo.player.min.js') }}"></script>
      <script rel="script/javascript" src="{{ asset('site_assets/js/main.js') }}"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/highlight.min.js"></script>
      <script>hljs.highlightAll();</script>
      <!--endbuild-->
    </body>
  </html>