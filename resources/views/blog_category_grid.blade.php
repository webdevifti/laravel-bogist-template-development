@extends('includes.master')
@section('MainContent')
<div class="no-pd" id="content">
  <div class="container">
        <div class="breadcrumb">
          <ul>
            <li><a href="{{ url('/') }}"> <i class="fas fa-home"></i>Home</a></li>
            <li><a href="#">Blog</a></li>
            <li class="active"><a href="#">{{ $cat }}</a></li>
          </ul>
        </div>
    <div class="category">
      <div class="row">
      @include('template-parts.category_part')
        <div class="col-12 col-md-7 col-lg-8 order-md-1">
          <div class="category__header">
            <div class="category__header__text">
              <h5>Categories:</h5><a href="#">{{ $cat }}</a>
            </div>
            <div class="category__header__filter">
              {{-- <a class="category__header__filter__item active" href="javascript:void(0)" data-layout="grid"><i class="fas fa-th"></i></a>
              <a class="category__header__filter__item" href="javascript:void(0)" data-layout="list"><i class="fas fa-bars"></i></a> --}}
              <a href="/grid/{{ $cat }}" class=""><i class="fas fa-th"></i></a>
              <a href="/list/{{ $cat }}" class=""><i class="fas fa-bars"></i></a>
            </div>
          </div>
          <div class="category_content">
           @include('template-parts.grid_post')
          </div>
              <div class="pagination">
                <ul>
                  <li class="active"><a href="javascript:void(0)">1</a></li>
                  <li class="pagination__page-number"><a href="javascript:void(0)">2</a></li>
                  <li class="pagination__page-number"><a href="javascript:void(0)">3</a></li>
                  <li><a class="next" href="javascript:void(0)">></a></li>
                </ul>
              </div>
        </div>
      </div>
    </div>
   @include('template-parts.instagram_post')
  </div>
</div>
    
@endsection
   