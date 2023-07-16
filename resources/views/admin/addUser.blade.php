@extends('layouts.admin')

<title>{{ config('app.name', 'Laravel') }} | Admin | Add User</title>

@section('main-content')

<style>
    .input {color:black}
</style>

<div id="alert" class="col-md-6">
    @if(Session::has('success'))
    <div class="alert alert-primary" role="alert">
        {{Session::get('success')}}
    </div>
    @endif
</div>

<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Add New User</h4>
    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">User Details</h5>
            <!-- <small class="text-muted float-end">Merged input group</small> -->
          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('add-new-user') }}" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class="bx bx-user"></i
                  ></span>
                  <input type="text" name="name" id="name" placeholder="John Doe" class="form-control input form-control-line" minlength="3" maxlength="30" onkeydown="return /[a-zA-Z\s]/i.test(event.key)">                                  
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-email">Email</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                  <input type="email" placeholder="john.doe" class="form-control input form-control-line" name="email" id="email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" title="Please Enter Valid Email : example@mail.com">
                  @error('email')
                  <span class="text-danger">{{$message}}</span>
                  @enderror  
                  <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                </div>
                <div class="form-text">You can use letters, numbers & periods</div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"
                    ><i class="bx bx-phone"></i
                  ></span>
                  <input type="text" placeholder="658 799 8941" name="phone" id="phone" class="form-control input form-control-line" minlength="10" maxlength="10" pattern="[0-9]{1}[0-9]{9}" title="Please Enter Valid 10 digits Phone Number">
                  @error('phone')
                  <span class="text-danger row">{{$message}}</span>
                  @enderror
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-image">Profile Pic</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-image" class="input-group-text"
                    ><i class="bx bx-image"></i
                  ></span>
                  <input type="file" id="image" accept="image/png, image/gif, image/jpeg" name="image" class="form-control form-control-line">
                </div>
              </div>
              <button type="button" onclick="getuser()" class="btn btn-success text-white">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / Content -->
  <div class="content-backdrop fade"></div>
</div>


<script>
    // $( document ).ready(function() {
        function getuser() {
          $('.text-danger').hide();
            var formData = new FormData();
            var email = $('#email').val();
            var name = $('#name').val();
            var phone = $('#phone').val();  
            var image = $('#image').prop('files')[0];  
            if(image) {
                formData.append('image', image);
            }            
            formData.append('name', name);
            formData.append('email', email);
            formData.append('phone', phone);
                $.ajax
                ({
                    type: "post",
                    url: "{{url('/add-new-user')}}",
                    contentType: 'multipart/form-data',
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    success: function(data){
                        if($.isEmptyObject(data.error)){
                            window.location.href = data.success;
                        }else{
                            // printErrorMsg(data.error);
                            $.each(data.error,function(field_name,error){
                                // $(document).find('[name='+field_name+']').after('<span class="text-strong text-danger">' +error+ '</span>')
                                $(document).find('#'+field_name+'').closest('div').after('<span class="text-strong text-danger">' +error+ '</span>')
                            })
                        }
                    }
                        
                })
            }

        // function printErrorMsg (msg) {
        //     $(".print-error-msg").find("ul").html('');
        //     $(".print-error-msg").css('display','block');
        //     $.each( msg, function( key, value ) {
        //         $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        //     });
        // }        
    // });
</script>
@endsection