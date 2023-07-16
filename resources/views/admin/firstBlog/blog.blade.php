@extends('layouts.admin')

<title>{{ config('app.name', 'Laravel') }} | Admin | Users</title>
<style>
    .edit:hover {
        color: #fff !important;
        background-color: blue !important;
        border-color: #696cff !important;
        border-radius: 5px !important;
    }
    .delete:hover {
        color: #fff !important;
        background-color: #E3242B !important;
        border-color: #E3242B !important;
        border-radius: 5px !important;
    }
</style>

@section('main-content')

<div style="margin-left:30px; margin-top:20px; height:70px">
    <div id="alert" class="col-md-3">
        @if(Session::has('success'))
        <div class="alert alert-primary" role="alert">
            {{Session::get('success')}}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

<div class="content-wrapper">
        <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y row">
        <div class="col-6"><h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Blogs /</span>First BLog Detail</h4></div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="add-first-blog" class="btn btn-primary text-white">Add New Blog</a>
            </div>
        </div>

        <!-- Basic Bootstrap Table -->
        <div class="card">
        <h5 class="card-header">Blog</h5>
        @if($blog)
        <div class="container">
            <div class="row mb-4">
                <div class="col-6">
                   <h1>Blog 1</h1>
                </div>
                <div class="col-6">
                    <h1>{{$blog->heading1}}</h1>
                    <p>{{$blog->description2}}</p>
                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <h1>Blog 2</h1>
                </div>
                <div class="col-6">
                    <h1>{{$blog->heading2}}</h1>
                    <p>{{$blog->description2}}</p>
                </div>

            </div>
        </div>
        @else
       <div class="container">
        <div class="row" align="center">
            <h1>You have to add a blog</h1>
        </div>
       </div>
        @endif
        </div>
    </div>
    <!-- / Content -->
</div>
@endsection
