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
        <div class="col-6"><h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Blogs /</span> Team</h4></div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="/export-detail" class="btn btn-primary text-white">Export</a>
            </div>
            
        </div>

        <!-- Basic Bootstrap Table -->
        <div class="card">
        <h5 class="card-header">Blog List</h5>
        <div class="table dataTable text-nowrap">
            <table class="table" id="services">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Contact Date</th>
                </tr>
            </thead>
                <tbody class="table-border-bottom-0">
                    @if(count($details) != 0)
                    @foreach($details as $key => $detail)
                    <tr id="row_{{$detail->uuid}}">
                        <td>{{ $key+1 }}</td>
                        <td class="name_{{$detail->uuid}}">{{$detail->name}}</td>
                        <td class="email_{{$detail->uuid}}">{{$detail->email}}</td>
                        <td class="phone_{{$detail->uuid}}">{{$detail->number}}</td>
                        <td class="phone_{{$detail->uuid}}">{{$detail->created_at}}</td>
                        
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td><span>{{ 'No record found' }}</span></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        </div>
    </div>
    <!-- / Content -->
</div>
@endsection
