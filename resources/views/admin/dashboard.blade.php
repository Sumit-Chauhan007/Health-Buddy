@extends('layouts.admin')

<title>{{ config('app.name', 'Laravel') }} | Admin | Dashboard</title>

@section('main-content')

    <div id="alert" class="col-md-6">
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

    <!-- container start -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <?php $userName = DB::table('users')
                                        ->where('role', '1')
                                        ->first(); ?>
                                    <h5 class="card-title text-primary mb-4">Welcome {{ $userName->name }}! 🎉</h5>
                                    <p class="mb-4">
                                        Welcome to the Admin Dashboard! As an esteemed Administrator, you hold the keys to
                                        unlock the full potential of our platform. This is your command center, where you
                                        can orchestrate seamless operations, drive innovation, and nurture an environment of
                                        growth. Let's embark on this empowering journey together!
                                    </p>
                                    @if(!$contact->isEmpty())
                                    <p style="color: orange" ><a  href="/user-contact">{{$contact->count()}}&nbsp;:&nbsp;:-  Person has Contacted Us Today</a></p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                        alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                        data-app-light-img="illustrations/man-with-laptop-light.png" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

   

        <div class="content-backdrop fade"></div>
    </div>
    <!-- container end -->

@endsection
