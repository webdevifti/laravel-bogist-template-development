@extends('admin.master.app')
@section('page_title','Admin | Contact Address Content')
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
                   <h3>Contact Address Content</h3>
               </div>
               <div class="card-body">
                   <form action="/admin/contact/update/{{ $contact_data->id }}" method="POST">
                       @csrf
                       @method('PUT')
                      
                       <div class="mt-3">
                           <label for="">Contact Description</label>
                           <textarea name="contact_content" id="" class="ckeditor form-control" cols="30" rows="10">{{ $contact_data->contact_content }}</textarea>
                       </div>
                       <div class="mt-3">
                           <label for="">Contact Address</label>
                           <input type="text" class="form-control" name="contact_address" value="{{ $contact_data->address }}">
                       </div>
                       <div class="mt-3">
                            <label for="">Contact Number</label>
                            <input type="text" class="form-control" name="contact_number" value="{{ $contact_data->contact_number }}">
                        </div>
                        <div class="mt-3">
                            <label for="">Email Address</label>
                            <input type="text" class="form-control" name="email_address" value="{{ $contact_data->email_address }}">
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
