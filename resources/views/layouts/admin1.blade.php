<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="keywords"
    content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
    content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('assets/images/favicon.png')}}">
    <!-- Custom CSS -->
    <link href="{{URL::asset('assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{URL::asset('dist/css/style.min.css')}}" rel="stylesheet">
    <!-- <link href="../dist/css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css"> -->
    <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <style>
        .cbg {background-color:linen;}
        .scl {color:seagreen;}
    </style>
</head>

<body>
   <!-- {{ $user = Auth::user();}} -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header" data-logobg="skin6">
                <a class="navbar-brand" href="/">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <img src="{{URL::asset('assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="{{URL::asset('assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                        <!-- dark Logo text -->
                        <img src="{{URL::asset('assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->
                        <img src="{{URL::asset('assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" />
                    </span>
                </a>
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="mdi mdi-menu"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto">
                        <!-- <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                            </form>
                        </li> -->
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(!Auth::user()->profile_photo_path)
                                    <img src="{{URL::asset('assets/images/users/avatar.jpg')}}" class="rounded-circle" width="31">
                                @else
                                    <img src="{{URL::asset('assets/images/users/')}}/{{Auth::user()->profile_photo_path}}" alt="user" class="rounded-circle" width="31">
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/admin-profile"><i class="mdi mdi-account-edit m-r-5 m-l-5"></i>
                                Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item"  
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                    <i class="mdi mdi-power m-r-5 m-l-5"></i> Sign Out </button>
                                </form>
                            </ul>
                        </li>
                    </ul>
                </div>
        </nav>
    </header>
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/admin-dashboard" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                        class="hide-menu">Dashboard</span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/users" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span
                        class="hide-menu">Users</span></a>
                    </li>
                    
                </ul>
            </nav>
                    <!-- End Sidebar navigation -->
        </div>
            <!-- End Sidebar scroll-->
    </aside>
    <div class="page-wrapper">
            <div class="page-breadcrumb">
                <main>
                    <!-- <div class="modal fade" id="profilemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Update Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('/upAdmin')}}" method="post" enctype="multipart/form-data" >
                                        @csrf
                                        <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
                                        <div class="form-group">
                                            <label class="col-md-12">User Name</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Name" minlength="3" id="user_name" name="name" value="{{$user->name}}" class="form-control form-control-line" required>
                                            </div>
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" placeholder="Email" id="user_email" name="email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" title="Please Enter Valid Email : example@mail.com" value="{{$user->email}}" class="form-control form-control-line" required>
                                            </div>
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Password</label>
                                            <div class="col-md-12">
                                                <input type="password" placeholder="Password" id="user_pass" name="password" value="" class="form-control form-control-line">
                                            </div>
                                            @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Phone</label>
                                            <div class="col-md-12">
                                                <input type="text" id="user_phone" name="phone" minlength="10" maxlength="10" placeholder="1234567890" pattern="[0-9]{1}[0-9]{9}" title="Please Enter Valid 10 digits Phone Number" value="{{$user->phone}}" class="form-control form-control-line" required>
                                            </div>
                                            @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Profile Pic</label>
                                            <div class="col-md-12">
                                            @if(!Auth::user()->profile_photo_path)
                                                <img src="assets/images/users/avatar.jpg" width="100" height="100">
                                            @else
                                                <img src="assets/images/users/{{Auth::user()->profile_photo_path}}" width="100" height="100">
                                            @endif
                                            </div>                            
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Upload Profile Pic</label>
                                            <div class="col-md-12">
                                                <input type="file" placeholder="Choose File" name="image" class="form-control form-control-line">
                                            </div>
                                            @error('image')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <button type="reset" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-sm btn-primary" >Update</button>                    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    @yield('main-content')
                </main>
            </div>
        </div>
    </div>
          <!-- All Jquery -->
          <!-- ============================================================== -->
          <!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> -->
          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <!-- Bootstrap tether Core JavaScript -->
          <script src="{{URL::asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
          <script src="{{URL::asset('dist/js/app-style-switcher.js')}}"></script>
          <!--Wave Effects -->
          <script src="{{URL::asset('dist/js/waves.js')}}"></script>
          <!--Menu sidebar -->
          <script src="{{URL::asset('dist/js/sidebarmenu.js')}}"></script>
          <!--Custom JavaScript -->
          <script src="{{URL::asset('dist/js/custom.js')}}"></script>
          <!--This page JavaScript -->
          <!--chartis chart-->
          <script src="{{URL::asset('assets/libs/chartist/dist/chartist.min.js')}}"></script>
          <script src="{{URL::asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
          <script src="{{URL::asset('dist/js/pages/dashboards/dashboard1.js')}}"></script>
          <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
	      <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
          <!-- <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> -->
          <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
            <script>
                $(document).ready(function() {
                    $('#services').DataTable();
                });

                setTimeout(function() {
                    $('#alert').hide();

                    }, 3000);

                // function VerifyUploadSizeIsOK()
                //     {
                //     var UploadFieldID = "file-upload";
                //     var MaxSizeInBytes = 5242880;
                //     var fld = document.getElementById(UploadFieldID);
                //     console.log(fld);
                //     if( fld.files && fld.files.length == 1 && fld.files[0].size > MaxSizeInBytes )
                //     {
                //         alert("The file size must be no more than " + parseInt(MaxSizeInBytes/1024/1024) + "MB");
                //         return false;
                //     }
                //     return true;
                //     }    
                $(document).ready(function() {

                    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                        removeItemButton: true,
                        // maxItemCount: 3,
                        // searchResultLimit: 5,
                        // renderChoiceLimit: 5
                    });

                    var multipleCancelButton1 = new Choices('#choices-multiple-remove-button1', {
                        removeItemButton: true,
                    });

                    var multipleCancelButton4 = new Choices('#choices-multiple-remove-button4', {
                        removeItemButton: true,
                    });

                    // var multipleCancelButton = new Choices('#choices-multiple-remove-button2', {
					// 		removeItemButton: true,
					// 	});

                    // var multipleCancelButton = new Choices('#choices-multiple-remove-button3', {
                    //     removeItemButton: true,
                    // });
                });
            </script>
      </body>

      </html>