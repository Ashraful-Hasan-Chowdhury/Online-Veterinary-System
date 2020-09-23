@extends('user.home')
@section('banner-title','পার্শ্ববর্তী পশু হাসপাতাল সমূহ')
@section('content')
<section class="contact-page-area section-gap" id="app">
    	{{-- <div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">পার্শ্ববর্তী পশু হাসপাতাল সমূহ</h2>
          </div>
        </div>
    	</div> --}}
    	 <user-map v-model="place"></user-map>
    </section>   
@endsection