@extends('includes.master')
@section('title','About')
@section('MainContent')
<div class="no-pd" id="content">
  <div class="container">
        <div class="breadcrumb mt-5">
          <ul>
            <li><a href="{{ url('/') }}"> <i class="fas fa-home"></i>Home</a></li>
            <li class="active"><a href="#">About</a></li>
          </ul>
        </div>
    <div class="about-us">
      <div class="row align-items-center">
        <div class="col-12 col-sm-8 col-md-6 mx-auto">
          <div class="about-us__image"><img src="{{ asset('uploads/abouts/'.$get_about_content->about_feature_image) }}" alt="About us image"/></div>
        </div>
        <div class="col-12 col-md-6">
          <div class="about-us__content">
           {!! $get_about_content->about_content !!}

           @if($getActiveSocialMedia)
            <div class="follow">
              <p>Follow us:</p>
              <div class="social-block">
                @foreach($getActiveSocialMedia as $media)
                <a href="{{ $media->social_url }}"><i class="{{ $media->icon_class }}"></i></a>
                @endforeach
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('template-parts.subscribe');
  <div class="container">
    @include('template-parts.instagram_post')
  </div>
</div>
    
@endsection
   