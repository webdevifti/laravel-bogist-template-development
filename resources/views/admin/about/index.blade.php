@extends('admin.master.app')
@section('page_title','Admin | About Content')
@section('Content')
    
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
       
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success mb-2">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger mb-2">
        {{ session()->get('error') }}
    </div>
@endif
   <div class="row">
       <div class="col-lg-12 col-sm-12 col-md-12">
           <div class="card shadow">
               <div class="card-header">
                   <h3>About Content</h3>
               </div>
               <div class="card-body">
                   <form action="/admin/about/update/{{ $get_data->id }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       @method('PUT')
                       <div class="mt-3">
                           <label for="">About Feature Image</label>
                           <input type="file" id="bi" oninput="pic.src=window.URL.createObjectURL(this.files[0])" class="form-control" name="about_feature_image"><br>
                           <img width="100" src="{{ asset('uploads/abouts/'.$get_data->about_feature_image) }}" id="pic" alt="">
                       </div>
                       <div class="mt-3">
                           <label for="">About Content</label>
                           <textarea name="about_content" id="" class="ckeditor form-control" cols="30" rows="10">{{ $get_data->about_content }}</textarea>
                       </div>
                       <div class="mt-3">
                           <button type="submit" class="btn btn-success">Save</button>
                       </div>
                   </form>
               </div>
           </div>

       </div>
   </div>
</div>
<!-- /.container-fluid -->
@endsection
