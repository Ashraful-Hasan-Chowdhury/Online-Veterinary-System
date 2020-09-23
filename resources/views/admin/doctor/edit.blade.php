@extends('multiauth::layouts.app')
@section('content')
{{-- Page Header starts --}}
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Pharmacy Info</h1>
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
<div class="row" id="app">
{{-- Vue id is here --}}

<div class="col-md-6">
      <div class="card">
              <div class="card-header bg-primary">
                <h5 class="card-title">Find & Mark a Doctor</h5>
              </div>
              <div class="card-body"> 
                <map-component v-model="place" :latval="{{ $doctor->lat }}" :lngval="{{ $doctor->lng }}"></map-component>
              </div>
            </div>
    </div>

    <div class="col-md-6">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Doctor Informations</h3>
                <a href="{{ route('view.doctors') }}" class="btn btn-success btn-sm float-right">Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update.doctor',$doctor->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                  <center>
                    <img src="{{ asset($doctor->image) }}" class="img-fluid border border-primary" style="height: 180px;width: 300px;" alt="No Image Found">
                  </center>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Doctor's Name</label>
                    <input name="name" value="{{ $doctor->name }}" type="text" class="form-control" placeholder="Enter Doctor's Name">
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Chamber</label>
                    <input name="chamber" type="text" v-if="place.name!=null" v-model="place.name" class="form-control" >
                    <input name="chamber" type="text" v-else value="{{ $doctor->chamber }}" class="form-control" >
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Latitude</label>
                    <input name="lat" type="text" v-if="place.lat!=null" v-model="place.lat" class="form-control" placeholder="Enter Latitude">
                    <input name="lat" type="text" v-else value="{{ $doctor->lat }}" class="form-control" placeholder="Enter Latitude">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Longitude</label>
                    <input name="lng" type="text" v-if="place.lng!=null" v-model="place.lng" class="form-control" placeholder="Enter Longitude">
                    <input name="lng" type="text" v-else value="{{ $doctor->lng }}" class="form-control" placeholder="Enter Longitude">
                  </div>
                  {{-- vue id ends here --}}
                  <div class="form-group">
                    <label>Direction</label>
                    <textarea name="direction" type="text" class="form-control" rows="5" placeholder="Write the directions of going the place">{{ $doctor->direction }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Desciption</label>
                    <textarea name="desciption" type="text" class="form-control" rows="5" placeholder="Write place desciption">{{ $doctor->desciption }}</textarea>
                  </div>

                  <div class="form-group" >
                    <label for="exampleInputEmail1">Phone</label>
                    <input name="phone" value="{{ $doctor->phone }}" type="text" class="form-control" placeholder="Enter Phone Number">
                  </div>
                   
                <div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>

                      <input type="hidden" name="old_photo" value="{{ $doctor->image }}">
                    </div>
                  </div> 
                  <button type="submit" class="btn btn-primary">Save Doctor</button>
                </div>
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
  
{{-- Form Endds --}}
 {{-- Main Card Starts --}}

 {{-- Main Card Ends --}}


@endsection