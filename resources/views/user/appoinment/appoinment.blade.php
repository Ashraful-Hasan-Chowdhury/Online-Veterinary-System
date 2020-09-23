@extends('user.home')
@section('content')
<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">আমার সিরিয়াল সমূহ</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ডাক্তারের নাম</th>
                      <th>সাক্ষাতের তারিখ</th>
                      <th>সাক্ষাতের দিন</th>
                      <th>সাক্ষাতের সময়</th>
                      <th>বিকাশ TrxID</th>
                      <th>স্টেটাস</th>
                      <th>চেম্বার</th>
                      <th>ফোন নাম্বার</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ডাক্তারের নাম</th>
                      <th>সাক্ষাতের তারিখ</th>
                      <th>সাক্ষাতের দিন</th>
                      <th>সাক্ষাতের সময়</th>
                      <th>বিকাশ TrxID</th>
                      <th>স্টেটাস</th>
                      <th>চেম্বার</th>
                      <th>ফোন নাম্বার</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($appoinments as $appoinment)
                      @foreach ($appoinment->users as $user)
                        @if ($user->id == auth()->id())
                          <tr>
                            <td>{{ $appoinment->doctors[0]->name }}</td>
                            <td>{{ $appoinment->date }}</td>
                            <td>{{ $appoinment->days[0]->day }}</td>
                            <td>{{ $appoinment->times[0]->time }}</td>
                            <td>{{ $appoinment->trxid }}</td>
                            <td>
                                @if ($appoinment->status == 'pending')
                                  অপেক্ষা করুন
                                @endif
                                @if ($appoinment->status == 'accepted')
                                  <h5 class="text-success">সম্পন্ন হয়েছে</h5>
                                  
                                @endif
                                @if ($appoinment->status == 'rejected')
                                <h5 class="text-danger">বাতিল করা হয়েছে</h5>
                                  
                                @endif
                            </td>
                            <td>{{ $appoinment->doctors[0]->chamber }}</td>
                            <td>{{ $appoinment->doctors[0]->phone }}</td>
                          </tr>
                        @endif
                      @endforeach
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