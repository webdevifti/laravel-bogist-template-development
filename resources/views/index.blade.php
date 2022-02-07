@extends('includes.master')
@section('title','Blogist')
@section('MainContent')
    <div id="content">
      <div class="container">
        @if($getActivePosts)
        <div class="blog-masonry">
          @foreach($getActivePosts as $post)
            <div class="post-card -center"><a class="card__cover" href="/post/{{ $post->slug }}"><img src="{{ asset('uploads/posts/'.$post->post_thumbnail) }}" alt="{{ $post->title }}"/></a>
              <div class="card__content">
                <h5 class="card__content-category">{{ $post->category }}</h5><a class="card__content-title" href="/post/{{ $post->slug }}">{{ $post->title }}</a>
                <div class="card__content-info">
                  <div class="info__time"><i class="far fa-clock"></i>
                    <p>{{ $post->created_at->diffForHumans() }}</p>
                  </div>
                  <div class="info__comment"><i class="far fa-comment"></i>
                    <p>3</p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        @endif
        <div class="center"><a class="btn -normal load-more-btn" href="#">Load more posts</a></div>
        <div class="instagrams">
          <div class="instagrams-container"><a class="instagrams-item" href="https://www.instagram.com/"><img src="site_assets/images/instagram/1.png" alt="Instagram image"/>
              <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
              </div></a><a class="instagrams-item" href="https://www.instagram.com/"><img src="site_assets/images/instagram/2.png" alt="Instagram image"/>
              <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
              </div></a><a class="instagrams-item" href="https://www.instagram.com/"><img src="site_assets/images/instagram/3.png" alt="Instagram image"/>
              <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
              </div></a><a class="instagrams-item" href="https://www.instagram.com/"><img src="site_assets/images/instagram/4.png" alt="Instagram image"/>
              <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
              </div></a><a class="instagrams-item" href="https://www.instagram.com/"><img src="site_assets/images/instagram/5.png" alt="Instagram image"/>
              <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
              </div></a><a class="instagrams-item" href="https://www.instagram.com/"><img src="site_assets/images/instagram/1.png" alt="Instagram image"/>
              <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
              </div></a><a class="instagrams-item" href="https://www.instagram.com/"><img src="site_assets/images/instagram/3.png" alt="Instagram image"/>
              <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
              </div></a><a class="instagrams-item" href="https://www.instagram.com/"><img src="site_assets/images/instagram/4.png" alt="Instagram image"/>
              <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
                <p>@ Gtute_News</p>
              </div></a>
          </div>
        </div>
      </div>
    </div>
@endsection
  