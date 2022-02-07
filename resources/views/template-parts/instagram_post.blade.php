<div class="instagrams">
    <div class="instagrams-container">
      @foreach($images as $key=>$image)
      <a class="instagrams-item" href="https://www.instagram.com/">
        <img src="{{ asset('uploads/instagram/'.$key.'.png') }}" alt="Instagram image"/>
        <div class="instagrams-item__content"><i class="fab fa-instagram"></i>
          <p>@ Gtute_News</p>
        </div>
      </a>
      @endforeach
      
      
    </div>
  </div>