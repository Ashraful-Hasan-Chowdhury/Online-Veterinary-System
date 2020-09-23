@extends('multiauth::layouts.app')

@section('content')
<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Not Approved Doctor admins</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($doctoradmin as $doctoradmin)
                    @if($doctoradmin->approve == null)
                    <tr>
                      <td>{{ $doctoradmin->name }}</td>
                      <td>{{ $doctoradmin->email }}</td>
                      <td>{{ $doctoradmin->mobile }}</td>
                      <td><a href="{{ route('single.doctoradmin',$doctoradmin->id) }}" class="btn btn-md btn-success">view details</a></td>
                    </tr>
                    @endif
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

    <!-- Page level custom scripts -->
  <script src="{{ asset('public/admin/js/demo/datatables-demo.js') }}"></script>
@endsection