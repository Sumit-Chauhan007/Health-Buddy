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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Edit New ABC Blog</h4>
    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Blog Details</h5>
            <!-- <small class="text-muted float-end">Merged input group</small> -->
          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('add-new-starting-blog') }}" enctype="multipart/form-data">
              <div class="row">
                <div class="mb-3 col-xl-6 col-xs-12">
                    <label class="form-label" for="basic-icon-default-fullname">Heading 1</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="bx bx-user"></i
                      ></span>
                      <input type="text" name="heading1" value="{{$AbcBlog->heading1}}" id="heading1" placeholder="Enter Your first Heading" class="form-control input form-control-line" minlength="3" maxlength="30" >
                    </div>
                  </div>
                  <div class="mb-3 col-xl-6 col-xs-12">
                    <label class="form-label" for="basic-icon-default-fullname">Description 1</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="bx bx-user"></i
                      ></span>
                      <textarea class="form-control input form-control-line"  name="description1"  id="description1" cols="30" rows="4">{{$AbcBlog->description1}}</textarea>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="mb-3 col-xl-6 col-xs-12">
                    <label class="form-label" for="basic-icon-default-fullname">Heading 2</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="bx bx-user"></i
                      ></span>
                      <input type="text" name="heading2" value="{{$AbcBlog->heading2}}" id="heading2" placeholder="Enter Your Second Heading" class="form-control input form-control-line" minlength="3" maxlength="30" >
                    </div>
                  </div>
                  <div class="mb-3 col-xl-6 col-xs-12">
                    <label class="form-label" for="basic-icon-default-fullname">Description 2</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="bx bx-user"></i
                      ></span>
                      <textarea class="form-control input form-control-line"  name="description2"  id="description2" cols="30" rows="4">{{$AbcBlog->description2}}</textarea>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="mb-3 col-xl-6 col-xs-12">
                    <label class="form-label" for="basic-icon-default-fullname">Heading 3</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="bx bx-user"></i
                      ></span>
                      <input type="text" name="heading3" value="{{$AbcBlog->heading3}}" id="heading3" placeholder="Enter Your Third Heading" class="form-control input form-control-line" minlength="3" maxlength="30" >
                    </div>
                  </div>
                  <div class="mb-3 col-xl-6 col-xs-12">
                    <label class="form-label" for="basic-icon-default-fullname">Description 3</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="bx bx-user"></i
                      ></span>
                      <textarea class="form-control input form-control-line"  name="description3"  id="description3" cols="30" rows="4">{{$AbcBlog->description3}}</textarea>
                    </div>
                  </div>
              </div>

              <button type="button" onclick="getuser('{{$AbcBlog->uuid}}')" class="btn btn-success text-white">Save</button>
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
        function getuser(id) {
          $('.text-danger').hide();
            var formData = new FormData();
            var heading1 = $('#heading1').val();
            var heading2 = $('#heading2').val();
            var heading3 = $('#heading3').val();
            var description1 = $('#description1').val();
            var description2 = $('#description2').val();
            var description3 = $('#description3').val();
            formData.append('heading1', heading1);
            formData.append('description1', description1);
            formData.append('heading2', heading2);
            formData.append('description2', description2);
            formData.append('heading3', heading3);
            formData.append('description3', description3);
            formData.append('uuid', id);
                $.ajax
                ({
                    type: "post",
                    url: "{{url('/add-new-abc-blog')}}",
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
