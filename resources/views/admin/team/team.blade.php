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
                <a href="/add-team-blog" class="btn btn-primary text-white">Add New Blog</a>
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
                    <th>Designation</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
                <tbody class="table-border-bottom-0">
                    @if(count($teams) != 0)
                    @foreach($teams as $key => $team)
                    <tr id="row_{{$team->uuid}}">
                        <td>{{ $key+1 }}</td>
                        <td class="name_{{$team->uuid}}">{{$team->name}}</td>
                        <td class="email_{{$team->uuid}}">{{$team->designation}}</td>
                        <td class="phone_{{$team->uuid}}">{{$team->description}}</td>
                        <td class="phone_{{$team->uuid}}">@include('admin.team.image')</td>

                        <td>
                            @if($team->status == 'Active')
                                <a style="color:white; background:green" class="btn btn-secondary btn-rounded edit-service" href="de-active-team-blog/{{$team->uuid}}">{{ucwords($team->status)}}</a>
                            @else
                                <a style="color:white; background:#e69b00" class="btn btn-secondary btn-rounded edit-service" href="active-team-blog/{{$team->uuid}}">{{ucwords($team->status)}}</a>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item edit" href="edit-team/{{$team->uuid}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item delete" onclick="return confirm('Are you sure you want to remove this user?');" href="/delete-team-blog/{{$team->uuid}}"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
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
