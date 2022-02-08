@if($getCategoryPosts)
@foreach($getCategoryPosts as $post)
<div class="col-12">
  <div class="post-card -small -horizontal">
    <a class="card__cover" href="/post/{{ $post->slug }}" tabindex="0">
      <img src="{{ asset('uploads/posts/'.$post->post_thumbnail) }}" alt="{{ $post->title }}">
    </a>
    <div class="card__content">
      <h5 class="card__content-category">{{ $post->category }}</h5><a class="card__content-title" href="/post/{{ $post->slug }}" tabindex="0">{{ $post->title }}</a>
      <div class="card__content-info">
        <div class="info__time"><i class="far fa-clock"></i>
          <p>{{ $post->created_at->diffForHumans() }}</p>
        </div>
        <div class="info__comment"><i class="far fa-comment"></i>
          <p>{{ count($post->comment) }}</p>
        </div>
      </div>
      <p class="card__content-description">{!! substr($post->article,0,50) !!}</p>
    </div>
  </div>
</div>
@endforeach
@endif