@extends('admin.master.app')
@section('page_title','Admin | Edit Social Media')
@section('Content')
    
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Social Media</h1>
        
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
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h3>Edit Social Media</h3>
                </div>
                <div class="card-body">
                    <form action="/admin/social/update/{{ $get_social_item->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            @foreach($icons as $icon)
                            <i style="cursor: pointer;padding: 8px;border: 1px solid #ddd" class="{{ $icon }} icons_name"><span style="display: none">{{ $icon }}</span></i>
                            @endforeach
                        </div>
                        <div class="mt-2">
                           
                            <label for="a">Social Media Icon</label>
                            <input type="text" value="{{ $get_social_item->icon_class }}" class="form-control" id="icon_input" name="social_icon">
                        </div>
                        <div class="mt-2">
                            <label for="a">Social Media Url</label>
                            <input type="url" class="form-control" value="{{ $get_social_item->social_url }}" name="social_url">
                        </div>
                        <div class="mt-2">
                           <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  

</div>
<!-- /.container-fluid -->
@endsection
