@extends('admin.master.app')
@section('page_title','Admin | Posts')
@section('Content')
    
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Posts</h1>
        <a href="{{ route('admin.post.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add New Post</a>
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
            <h6 class="m-0 font-weight-bold text-primary">Posts Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Post Title</th>
                            <th>Post Thumbnail</th>
                            <th>Category</th>
                            <th>Posted By</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Post Title</th>
                            <th>Post Thumbnail</th>
                            <th>Category</th>
                            <th>Posted By</th>
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
                        @foreach ($posts as $post)  
                        @php
                            $sl++
                        @endphp
                            <tr>
                                <td>{{ $sl; }}</td>
                                <td>{{ $post->title }}</td>
                                <td><img src="{{ asset('uploads/posts/'.$post->post_thumbnail) }}" alt="" width="100"></td>
                                <td>{{ $post->category }}</td>
                                <td>{{ $post->posted_by }}</td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                <td>{{ $post->updated_at->diffForHumans() }}</td>
                                <td>
                                    @if($post->status == 1)
                                        <a class="btn btn-success" href="/admin/post/status/{{ $post->id }}">Published</a>
                                    @else
                                        <a class="btn btn-secondary" href="/admin/post/status/{{ $post->id }}">Unpublished</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="/admin/post/{{ $post->id }}/edit" class="btn btn-info">Edit</a>
                                    
                                    <form action="/admin/post/{{ $post->id }}" method="POST">  
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $post->id }}"/> 
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
