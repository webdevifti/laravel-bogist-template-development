@extends('includes.master')
@section('title',$get_post->title)
@section('MainContent')
@if($get_post) 
<div id="content">
  <div class="post">
    <div class="container">
      <div class="post-standard">
        <div class="post-standard__banner">
          <div class="post-standard__banner__image">
            <img src="{{ asset('uploads/posts/'.$get_post->post_thumbnail) }}" alt="{{ $get_post->title }}"/>
          </div>
          <div class="post-standard__banner__content">
                <div class="post-card -center">
                  <div></div>
                  <div class="card__content">
                    <h5 class="card__content-category">{{ $get_post->category }}</h5>
                    <a class="card__content-title" >{{ $get_post->title }}</a>
                    <div class="card__content-info">
                      <div class="info__time"><i class="far fa-clock"></i>
                        <p>{{ $get_post->created_at->diffForHumans() }}</p>
                      </div>
                      <div class="info__comment"><i class="far fa-comment"></i>
                        <p>{{ count($get_post->comment) }}</p>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-8 mx-auto">
            <div class="post-standard__content">
              <div id="post-share">
                <h5>Share:</h5>
                <div class="social-media"><a href="#" style="background-color: #075ec8"><i class="fab fa-facebook-f"></i></a><a href="#" style="background-color: #40c4ff"><i class="fab fa-twitter"></i></a><a href="#" style="background-image: linear-gradient(to top, #f2a937, #d92e73, #9937b7, #4a66d3), linear-gradient(to top, #af00e1, #ff9e35)"><i class="fab fa-instagram"></i></a><a href="#" style="background-color: #ff0000"><i class="fab fa-youtube"></i></a></div>
              </div>
              <div class="post_content">

                {!! $get_post->article !!}
              </div>
                  
              <div class="post-footer">
                @if($getactivecategories)
                <div class="post-footer__tags center">
                  <div class="tags-group">
                    @foreach($getactivecategories as $ac)
                    <a class="tag-btn" href="/list/{{ $ac->category_slug }}">{{ $ac->category_name }}</a>
                    @endforeach
                  </div>
                </div>
                @endif
                <div class="post-footer__author">
                  <div class="author__avatar"><img src="assets/images/post_detail/author.png" alt="Author avatar"/></div>
                  <div class="author__info">
                    <h5>Lena Mollein</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse vel facilisis. </p>
                    <div class="social-media"><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i class="fab fa-dribbble"></i></a></div>
                  </div>
                </div>
                @if($getRandomPost)
                <div class="post-footer__related">
                  @foreach ($getRandomPost as $key=>$item)
                      @php
                          $i = $key
                      @endphp
                      @if($i == 0)
                  <div class="post-footer__related__item {{ $i == 0 ? '-prev': ''}} ">
                    <a href="/post/{{ $item->slug }}"> <i class="fas fa-chevron-left"></i>Previous posts</a>
                    <div class="post-footer__related__item__content">
                      <img src="{{ asset('uploads/posts/'.$item->post_thumbnail) }}" alt="{{ $item->title }}"/>
                        <div class="post-card ">
                          <div></div>
                          <div class="card__content">
                            <h5 class="card__content-category">{{ $item->category }}</h5><a class="card__content-title" href="/post/{{ $item->slug }}">{{ $item->title }}</a>
                          </div>
                        </div>
                    </div>
                  </div>
                  @else 

                  <div class="post-footer__related__item {{ $i == 1 ? '-next': ''}}">
                    <a href="/post/{{ $item->slug }}">Next posts<i class="fas fa-chevron-right"></i></a>
                    <div class="post-footer__related__item__content">
                      <div class="post-card -right">
                        <div></div>
                        <div class="card__content">
                          <h5 class="card__content-category">{{ $item->category }}</h5><a class="card__content-title" href="/post/{{ $item->slug }}">{{ $item->title }}</a>
                        </div>
                      </div><img src="{{ asset('uploads/posts/'.$item->post_thumbnail) }}" alt="{{ $item->title }}"/>
                    </div>
                  </div>
                  @endif
                  @endforeach
                </div>
                @endif
                <div class="post-footer__comment">
                  <h3 class="comment-title"> <span>{{ $get_post->comment->count() }} comment</span></h3>
                  <div class="post-footer__comment__detail">
                    @if($comments)
                    @foreach($comments as $comment)
                    <div class="comment__item">
                      
                      <div class="comment__item__content">
                        <div class="comment__item__content__header">
                          <h5>{{ $comment->name }}</h5>
                          <div class="data">
                            <p><i class="far fa-clock"></i>{{ $comment->created_at->diffForHumans() }}</p>
                          </div>
                        </div>
                        <p>{{ $comment->comments }}</p>
                      </div>
                    </div>
                    @endforeach
                    {{ $comments->links() }}
                    @endif
                  </div>
                  <h3 class="comment-title" id="comments"> <span>Leave a comment</span></h3>
                  @if(session()->has('success_commented'))
                    <div style="color: green">
                      {{ session()->get('success_commented') }}
                    </div>
                    @endif
                    @if(session()->has('error_commented'))
                    <div style="color: red">
                      {{ session()->get('error_commented') }}
                    </div>
                    @endif
                    @if($errors->any())
                      @foreach ($errors->all() as $error)
                          <div style="color: red">{{ $error }}</div>
                      @endforeach
                    @endif
                  <div class="post-footer__comment__form" >
                    <form action="{{ route('comment.store') }}" method="POST">
                      @csrf
                      <input type="hidden" name="post_id" value="{{ $get_post->id }}">
                      <div class="row">
                        <div class="col-12 col-sm-4">
                          <input type="text" placeholder="Name" name="name"/>
                        </div>
                        <div class="col-12 col-sm-4">
                          <input type="email" placeholder="Email" name="email"/>
                        </div>
                       
                      </div>
                      <textarea cols="30" rows="5" placeholder="Messages" name="message"></textarea>
                      <div class="center">
                        <button type="submit" class="btn">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    @include('template-parts.instagram_post')
  </div>
</div>
@endif
@endsection
  