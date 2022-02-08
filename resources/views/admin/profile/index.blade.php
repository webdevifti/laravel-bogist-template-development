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
                   <h3>My Profile</h3>
               </div>
               <div class="card-body">
                 
               </div>
           </div>

       </div>
   </div>
</div>
<!-- /.container-fluid -->
@endsection
