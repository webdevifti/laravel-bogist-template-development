@extends('includes.master')
@section('title','Contact')
@section('MainContent')
<div class="no-pd" id="content">
  <div class="container">
        <div class="breadcrumb mt-5">
          <ul>
            <li><a href="{{ url('/') }}"> <i class="fas fa-home"></i>Home</a></li>
            <li class="active"><a href="#">Contact us</a></li>
          </ul>
        </div>
    <div class="contact-us">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="contact-us__info">
            {!! $get_contact_info->contact_content !!}
            <div class="contact-method">
              <div class="contact-method__item"><i class="fas fa-map-marker-alt"></i>
                <p>{{ $get_contact_info->address }}</p>
              </div>
              <div class="contact-method__item"><i class="fas fa-mobile-alt"></i>
                <p>{{ $get_contact_info->contact_number }}</p>
              </div>
              <div class="contact-method__item"><i class="fas fa-headphones-alt"></i>
                <p>{{ $get_contact_info->email_address }}</p>
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
  @include('template-parts.subscribe');
  <div class="container">
    @include('template-parts.instagram_post')
  </div>
</div>
    
@endsection
  