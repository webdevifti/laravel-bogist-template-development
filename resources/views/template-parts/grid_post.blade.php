@if($getCategoryPosts)
<div class="blog-masonry">
  @foreach($getCategoryPosts as $post)
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
{{ $getCategoryPosts->links() }}
@endif