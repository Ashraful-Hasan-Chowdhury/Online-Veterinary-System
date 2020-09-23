@extends('multiauth::layouts.app')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Approve Profile</h1>
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
              
                    
                    <center>
                      <img src="{{ asset($profile->image) }}" alt="no image found" style="width: 300px;height: 200px;">
                    </center>
                <div class="card-body">
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Doctor Admin Name</label>
                    <input name="name" type="text" class="form-control" value="{{ $profile->name }}" disabled>
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Mobile</label>
                    <input name="phone" type="text" class="form-control" value="{{ $profile->mobile }}" disabled>
                  </div>

                  <div class="form-group" >
                    <label for="exampleInputEmail1">NID Image</label>
                    
                      <center>
                      <img src="{{ asset($profile->nid) }}" alt="no image found" style="width: 300px;height: 200px;">
                    </center>
                    
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Chamber/Doctor Documents Image</label>
                    <center>
                      <img src="{{ asset($profile->chamber_doc) }}" alt="no image found" style="width: 300px;height: 200px;">
                    </center>
                  </div>
                  

                   <a href="{{ route('approve.doctoradmin',$profile->id) }}" class="btn btn-md btn-success">Approve</a>
                   <a href="" class="btn btn-md btn-danger">Reject</a>
              </div>
              
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