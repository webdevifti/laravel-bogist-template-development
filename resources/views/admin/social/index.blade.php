@extends('admin.master.app')
@section('page_title','Admin |Social Media')
@section('Content')
    
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Social Media</h1>
        
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
                    <h3>Add New Social Media</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.social.store') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            @foreach($icons as $icon)
                            
                            <i style="cursor: pointer;padding: 8px;border: 1px solid #ddd" class="{{ $icon }} icons_name"><span style="display: none">{{ $icon }}</span></i>
                            @endforeach
                        </div>
                        <div class="mt-2">
                           
                            <label for="a">Social Media Icon</label>
                            <input type="text" class="form-control" id="icon_input" name="social_icon">
                        </div>
                        <div class="mt-2">
                            <label for="a">Social Media Url</label>
                            <input type="url" class="form-control" name="social_url">
                        </div>
                        <div class="mt-2">
                           <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

       

        <div class="col-lg-8 col-md-8 col-sm-12">

            <div class="card shadow">
                <div class="card-header"><h3>Your Social Media </h3></div>
                <div class="card-body">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Social Media Icon</th>
                                <th>Social Media Url</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Social Media Icon</th>
                                <th>Social Media Url</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $sl = 0;
                            @endphp
                            @foreach($social_media as $social)
                            @php
                                $sl++
                            @endphp
                            <tr>
                                <td>{{ $sl }}</td>
                                <td><i style="font-size: 24px" class="{{ $social->icon_class }}"></i></td>
                                <td>{{ $social->social_url }}</td>
                                <td>
                                    @if($social->status == 1)
                                        <a class="btn btn-success" href="/admin/social/status/{{ $social->id }}">Active</a>
                                    @else
                                        <a class="btn btn-secondary" href="/admin/social/status/{{ $social->id }}">Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="/admin/social/{{ $social->id }}/edit" class="btn btn-info">Edit</a>
                                    
                                    <form action="/admin/social/{{ $social->id }}" method="POST">  
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $social->id }}"/> 
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
  

</div>
<!-- /.container-fluid -->
@endsection
