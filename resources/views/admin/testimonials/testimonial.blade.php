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

    .name {
        min-width: 116px;
    }

    .descp {
        min-width: 100px;
    }

    .dsgn {
        min-width: 100px;
    }

    .img {
        min-width: 100px;
    }

    .stst {
        min-width: 100px;
    }
</style>

@section('main-content')

    <div style="margin-left:30px; margin-top:20px; height:70px">
        <div id="alert" class="col-md-3">
            @if (Session::has('success'))
                <div class="alert alert-primary" role="alert">
                    {{ Session::get('success') }}
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
            <div class="col-6">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Testimonials /</span> Testimonials</h4>
            </div>
            <div class="col-6">
                <div class="text-end upgrade-btn">
                    <a href="/add-testimonial" class="btn btn-primary text-white">Add New Testimonial</a>
                </div>
            </div>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Testimonial List</h5>
                <div class="table dataTable text-nowrap">
                    <table class="table" id="services">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="name">Name</th>
                                <th class="descp">Description</th>
                                <th class="dsgn">Designation</th>
                                <th class="img">Image</th>
                                <th class="stst">Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if (count($Testimonials) != 0)
                                @foreach ($Testimonials as $key => $Testimonial)
                                    <tr id="row_{{ $Testimonial->uuid }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td class="name_{{ $Testimonial->uuid }} ">{{ $Testimonial->name }}</td>
                                        <td class="email_{{ $Testimonial->uuid }} ">{!! implode(' ', array_slice(explode(' ', $Testimonial->description), 0, 10)) !!}
                                             <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#readMoreDescp">Read More</a>
                                            <div class="modal fade" id="readMoreDescp" tabindex="-1"
                                                aria-labelledby="readMoreDescpLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="readMoreDescpLabel">Testimonial Description
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{ $Testimonial->description }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="phone_{{ $Testimonial->uuid }} ">{{ $Testimonial->designation }}</td>
                                        <td class="phone_{{ $Testimonial->uuid }} ">
                                            @include('admin.testimonials.image')
                                        </td>
                                        <td>
                                            @if ($Testimonial->status == 'Active')
                                                <a style="color:white; background:green"
                                                    class="btn btn-secondary btn-rounded edit-service"
                                                    href="de-active-testimonial/{{ $Testimonial->uuid }}">{{ ucwords($Testimonial->status) }}</a>
                                            @else
                                                <a style="color:white; background:#e69b00"
                                                    class="btn btn-secondary btn-rounded edit-service"
                                                    href="active-testimonial/{{ $Testimonial->uuid }}">{{ ucwords($Testimonial->status) }}</a>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item edit"
                                                        href="edit-testimonial/{{ $Testimonial->uuid }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item delete"
                                                        onclick="return confirm('Are you sure you want to remove this user?');"
                                                        href="/deleteTestimonial/{{ $Testimonial->uuid }}"><i
                                                            class="bx bx-trash me-1"></i> Delete</a>
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
