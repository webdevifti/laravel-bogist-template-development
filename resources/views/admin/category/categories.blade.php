@extends('admin.master.app')
@section('page_title','Admin | Categories')
@section('Content')
    
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        <a href="{{ route('admin.add_category') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add New Category</a>
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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $sl = 0;
                        @endphp
                        @foreach ($categories as $category)  
                        @php
                            $sl++
                        @endphp
                            <tr>
                                <td>{{ $sl; }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                <td>{{ $category->updated_at->diffForHumans() }}</td>
                                <td>
                                    @if($category->status == 1)
                                        <a class="btn btn-success" href="/admin/category/status/{{ $category->id }}">Active</a>
                                    @else
                                        <a class="btn btn-secondary" href="/admin/category/status/{{ $category->id }}">Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="/admin/category/{{ $category->id }}/edit" class="btn btn-info">Edit</a>
                                    
                                    <form action="/admin/category/{{ $category->id }}" method="POST">  
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $category->id }}"/> 
                                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                      </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
