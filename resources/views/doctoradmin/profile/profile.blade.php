@extends('doctoradmin.layouts.app')
@section('menuRoom', 'menu-open')
@section('roomActive', 'active')
@section('mainTitle', 'Profile |')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
{{-- Page Header Ends --}}
{{-- Form Starts --}}
<div class="row">
{{-- Vue id is here --}}

    <div class="col-md-10 offset-1">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Doctor Admin Informations</h3>
              </div>
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update.admin') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($profile->approve == null)
                    	{{-- expr --}}
                    <h5 class="ml-2 text-danger"> ** please complete your profile for approval</h5>
                    @endif
                    <center>
                    	<img src="{{ asset($profile->image) }}" alt="no image found" style="width: 300px;height: 200px;">
                    </center>
                <div class="card-body">
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Your Name</label>
                    <input name="name" type="text" class="form-control" value="{{ $profile->name }}">
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Mobile</label>
                    <input name="phone" type="text" class="form-control" value="{{ $profile->mobile }}">
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">NID Image</label>
                    <div class="custom-file">
                      <input type="file" name="nid" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>

                      <input type="hidden" name="old_nid" value="{{ $profile->nid }}">
                    </div>
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Chamber/Hospital Documents Image</label>
                    <div class="custom-file">
                      <input type="file" name="chamber_doc" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>

                      <input type="hidden" name="old_doc" value="{{ $profile->chamber_doc }}">
                    </div>
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Your Image</label>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>

                      <input type="hidden" name="old_photo" value="{{ $profile->image }}">
                    </div>
                  </div>

                   <button type="submit" class="btn btn-primary">Update Profile</button>
              </div>
              </form>
            </div>
          </div>
    </div>

 <script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<script>
  CKEDITOR.replace('editor', {
     filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
     filebrowserUploadMethod: 'form'
 })
 CKEDITOR.config.height = 500;
</script>
  
{{-- Form Endds --}}
 {{-- Main Card Starts --}}

 {{-- Main Card Ends --}}


@endsection