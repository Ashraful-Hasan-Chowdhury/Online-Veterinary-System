@extends('multiauth::layouts.app')
@section('content')
<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Added Pharmacies</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Pharmacy Name</th>
                      <th>Lattitude</th>
                      <th>Longitude</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sl</th>
                      <th>Pharmacy Name</th>
                      <th>Lattitude</th>
                      <th>Longitude</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($pharmacies as $pharmacy)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{ $pharmacy->name }}</td>
                      <td>{{ $pharmacy->lat }}</td>
                      <td>{{ $pharmacy->lng }}</td>
                      <td><a href="{{ route('edit.pharmacy',$pharmacy->id) }}"><i class="fas fa-edit ml-3"></i></a></td>
                      <td><a href="{{ route('delete.pharmacy',$pharmacy->id) }}" id="delete"><i class="fas fa-trash-alt ml-3 text-danger"></i></a></td>
                    </tr>
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