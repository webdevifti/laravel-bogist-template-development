<div class="col-12 col-md-5 col-lg-4 order-md-2">
    <div class="blog-sidebar">
      @if($getactivecategories)
      <div class="blog-sidebar-section -category">
        <div class="center-line-title"> 
          <h5>Categories</h5>
        </div>
        @foreach($getactivecategories as $c)
        <a class="category -bar " href="blog_category_grid.html">
          <div class="category__background" style="background-image: url({{asset('site_assets/images/backgrounds/category-1.png') }})"></div>
          <h5 class="title">{{ $c->category_name }}</h5>
          <h5 class="quantity">12</h5>
        </a>
        @endforeach     
      </div>
      @endif

      @if($trendingPosts)
      <div class="blog-sidebar-section -trending-post">
        <div class="center-line-title"> 
          <h5>Trending post</h5>
        </div>
        @foreach($trendingPosts as $tp)
        <div class="trending-post">
          <div class="trending-post_image">
            <div class="rank">1</div><img src="{{ asset('uploads/posts/'.$tp->post_thumbnail) }}" alt="{{ $tp->title }}"/>
          </div>
          <div class="trending-post_content">
            <h5>{{ $tp->category }}</h5><a href="/post/{{ $tp->slug }}">{{ substr($tp->title,0,50) }}</a>
            <div class="info__time"><i class="far fa-clock"></i>
              <p>{{ $tp->created_at->diffForHumans(); }}</p>
            </div>
          </div>
        </div> 
        @endforeach
      </div>
      @endif
      <form class="subcribe-box subcribe-box" action="/" method="POST">
        <h5>Subcribe</h5>
        <p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed tempor.</p>
        <input placeholder="Your email" name="email" type="email"/><a class="btn -normal" href="#">Subcribe</a>
      </form>
    </div>
  </div>