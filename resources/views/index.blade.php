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
                    <p>{{ count($post->comment) }}</p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        @endif
        {{ $getActivePosts->links() }}
        {{-- <div class="center"><a class="btn -normal load-more-btn" href="#">Load more posts</a></div> --}}
        @include('template-parts.instagram_post')
      </div>
    </div>
@endsection
  