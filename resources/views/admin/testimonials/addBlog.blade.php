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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Add New Testimonial </h4>
    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Blog Details</h5>
            <!-- <small class="text-muted float-end">Merged input group</small> -->
          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('/add-new-testimonial') }}" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Name</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class="bx bx-user"></i
                  ></span>
                  <input type="text" name="Name" id="Name" placeholder="Enter Your Name" class="form-control input form-control-line" minlength="3" maxlength="30" >
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Designation</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class="bx bx-user"></i
                  ></span>
                  <input type="text" name="Designation" id="Designation" placeholder="Enter Designation" class="form-control input form-control-line" minlength="3" maxlength="30" >
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Description</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class="bx bx-user"></i
                  ></span>
                  <textarea class="form-control input form-control-line"  name="description" id="description" cols="30" rows="4"></textarea>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-image">Image</label>
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
            var Name = $('#Name').val();
            var description = $('#description').val();
            var Designation = $('#Designation').val();
            var image = $('#image').prop('files')[0];
            if(image) {
                formData.append('image', image);
            }
            formData.append('Name', Name);
            formData.append('description', description);
            formData.append('Designation', Designation);
                $.ajax
                ({
                    type: "post",
                    url: "{{url('/add-new-testimonial')}}",
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
