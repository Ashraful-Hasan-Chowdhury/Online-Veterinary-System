 @extends('multiauth::layouts.app')
@section('content')
{{-- Page Header starts --}}
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Cures</h1>
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
                <h3 class="card-title">Cure Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update.cure',$cure->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label class="mt-3" for="title">Animals</label>
                    <select class="select2 border-primary" multiple="multiple"
                                            data-placeholder="Select Animals" data-dropdown-css-class="select2-purple"
                                            name="animals[]" style="width: 100%;">
                                            @foreach ($animals as $row)
                                                <option value="{{$row->id}}"
                                                  @foreach ($cure->animals as $animal)
                                                    @if ($animal->id == $row->id)
                                                      selected
                                                    @endif
                                                  @endforeach
                                                  >{{$row->name}}</option>
                                            @endforeach  
                        </select>
                  </div>

                  <div class="form-group">
                    <label class="mt-3">Diseases</label>
                    <select class="select2 border-primary" multiple="multiple"
                                        data-placeholder="Select Places" data-dropdown-css-class="select2-purple"
                                        name="diseases[]" style="width: 100%;">
                                        @foreach ($diseases as $row)
                                            <option value="{{$row->id}}"
                                              @foreach ($cure->diseases as $d)
                                                @if ($d->id == $row->id)
                                                  selected
                                                @endif
                                              @endforeach
                                              >{{$row->name}}</option>
                                        @endforeach  
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Symptoms</label>
                    <textarea class="form-control" rows="3" name="symptoms">{{ $cure->symptoms }}</textarea>
                  </div>

                  <div class="form-group">
                    <label class="mt-3" for="title">Cures</label>
                    <textarea name="cures" id="editor">{{ $cure->cures }}</textarea>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Save Cure</button>
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
<script type="text/javascript">
    $(document).ready(function () {
    $('.select2').select2();
  
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
  });
  });
</script>
<script>
  CKEDITOR.replace('editor', {
     filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
     filebrowserUploadMethod: 'form'
 })
 CKEDITOR.config.height = 350;
</script>
  
{{-- Form Endds --}}
 {{-- Main Card Starts --}}

 {{-- Main Card Ends --}}


@endsection