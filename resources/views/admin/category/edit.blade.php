@extends('admin.master.app')
@section('page_title','Admin | Edit Category')
@section('Content')
    
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
        <a href="{{ route('admin.category') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
        <div class="col-lg-4 m-auto col-md-6 col-sm-8">
            <div class="card shadow mb-4">
        
                <div class="card-body">
                    <form action="/admin/category/update/{{ $category->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="cat">Category Name</label>
                            <input type="text" id="cat" value="{{ $category->category_name }}" name="category_name" placeholder="Enter Category Name" class="form-control">
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
