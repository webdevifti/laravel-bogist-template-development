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
          <div class="about-us__image"><img src="{{ asset('site_assets/images/pages/about/1.png') }}" alt="About us image"/></div>
        </div>
        <div class="col-12 col-md-6">
          <div class="about-us__content">
            <h3>Thank you for visit out my website.</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores sit amet vel facilisis beatae vitae dicta sunt.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus.</p>
            <div class="follow">
              <p>Follow us:</p>
              @if($getActiveSocialMedia)
              <div class="social-block">
                @foreach($getActiveSocialMedia as $media)
                <a href="{{ $media->social_url }}"><i class="{{ $media->icon_class }}"></i></a>
                @endforeach
              </div>
              @endif
            </div>
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
   