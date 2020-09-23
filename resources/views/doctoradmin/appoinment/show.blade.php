@extends('doctoradmin.layouts.app')
@section('content')
<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Added Doctors</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>User Name</th>
                      <th>Doctor Name</th>
                      <th>TrxID</th>
                      <th>Status</th>
                      <th>Visiting Date</th>
                      <th>Visiting Day</th>
                      <th>Visiting Hour</th>
                      <th>Accept</th>
                      <th>Reject</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sl</th>
                      <th>User Name</th>
                      <th>Doctor Name</th>
                      <th>TrxID</th>
                      <th>Status</th>
                      <th>Visiting Date</th>
                      <th>Visiting Day</th>
                      <th>Visiting Hour</th>
                      <th>Accept</th>
                      <th>Reject</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($appoinments as $appoinment)
                    @if ($appoinment->status != 'rejected')
                      <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{ $appoinment->users[0]->name }}</td>
                      <td>{{ $appoinment->doctors[0]->name }}</td>
                      <td>{{ $appoinment->trxid }}</td>
                      <td>{{ $appoinment->status }}</td>
                      <td>{{ $appoinment->date }}</td>
                      <td>{{ $appoinment->days[0]->day }}</td>
                      <td>{{ $appoinment->times[0]->time }}</td>
                      <td>
                        @if ($appoinment->status == 'accepted')
                          <h5 class="text-success">Confirmed</h5>
                        @endif
                        @if ($appoinment->status != 'accepted')
                          <a href="{{route('accept',['id'=>$appoinment->id])}}" class="btn btn-sm btn-success">Confirm</a></td>
                        @endif

                        
                            <td><a href="{{route('reject',['id'=>$appoinment->id])}}" class="btn btn-sm btn-danger">Reject</a></td>
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