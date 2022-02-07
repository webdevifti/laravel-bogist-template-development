@extends('admin.master.app')
@section('page_title','Admin | Edit Post')
@section('Content')
    
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Post</h1>
        <a href="{{ route('admin.post') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Go Back</a>
    </div>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger mb-2">{{ $error }}</div>
        @endforeach
    @endif
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
        <div class="col-lg-12 m-auto col-md-12 col-sm-12">
            <div class="card shadow mb-4">
        
                <div class="card-body">
                    <form action="/admin/post/update/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="cat">Post Category</label>
                            <select name="post_category" id="cat" class="form-control">
                                <option value="">Select category</option>
                                @foreach($get_active_categories as $cat)
                                    @if($post->category == $cat->category_name)
                                    <option selected value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                                    @else

                                    <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="title">Post Title</label>
                            <input type="text" name="post_title" value="{{ $post->title }}" class="form-control" placeholder="Enter Post Title">
                        </div>
                        <div class="mb-3">
                            <label for="article">Post Content</label>
                            <textarea class="form-control ckeditor" name="article" id="article" cols="30" rows="10" placeholder="Write Post">{{ $post->article }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="bi">Post Thumnail</label>
                            <input type="file" id="bi" oninput="pic.src=window.URL.createObjectURL(this.files[0])" class="form-control" name="post_thumbnail"><br>
                            <img width="100" src="{{ asset('uploads/posts/'.$post->post_thumbnail) }}" id="pic" alt="">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  

</div>
<!-- /.container-fluid -->
@endsection
