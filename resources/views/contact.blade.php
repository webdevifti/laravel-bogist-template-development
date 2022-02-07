@extends('includes.master')
@section('MainContent')
<div class="no-pd" id="content">
  <div class="container">
        <div class="breadcrumb">
          <ul>
            <li><a href="{{ url('/') }}"> <i class="fas fa-home"></i>Home</a></li>
            <li class="active"><a href="#">Contact us</a></li>
          </ul>
        </div>
    <div class="contact-us">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="contact-us__info">
            <h3 class="contact-title">GET IN TOUCH</h3>
            <p class="contact-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
            <div class="contact-method">
              <div class="contact-method__item"><i class="fas fa-map-marker-alt"></i>
                <p>5 South Main Street Los Angeles, ZZ-96110 USA</p>
              </div>
              <div class="contact-method__item"><i class="fas fa-mobile-alt"></i>
                <p>125-711-811   |   125-668-886</p>
              </div>
              <div class="contact-method__item"><i class="fas fa-headphones-alt"></i>
                <p>Support.hosting@gmail.com</p>
              </div>
            </div>
          </div>
          <div class="contact-us__social">
            <h3 class="contact-title">GET IN TOUCH</h3>
            @if($getActiveSocialMedia)
              <div class="social-block">
                @foreach($getActiveSocialMedia as $media)
                <a href="{{ $media->social_url }}"><i class="{{ $media->icon_class }}"></i></a>
                @endforeach
              </div>
              @endif
            
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="contact-us__form">
            <h3 class="contact-title">LEAVE A MESSAGE</h3>
            <form action="/">
              <input type="text" placeholder="Name" name="name"/>
              <input type="email" placeholder="Email" name="email"/>
              <input type="text" placeholder="Website" name="website"/>
              <textarea name="message" cols="30" rows="8" placeholder="Message"></textarea>
              <button class="btn -normal">Send message</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="subcribe-bar">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="subcribe-bar__content">
            <h5>Don’t miss our future updates!</h5>
            <h3>Get Subscribe today!</h3>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <form class="subcribe-bar__form" action="/">
            <input type="text" placeholder="You email"/>
            <button class="btn -normal">Subcribe  </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    @include('template-parts.instagram_post')
  </div>
</div>
    
@endsection
  