	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		@include('user.layouts.head')	
	</head>
		<body>
			@include('user.layouts.nav')	
			  <!-- #header -->
			<!-- start banner Area -->
			@include('user.layouts.banner')	
			
			<!-- End banner Area -->

			<!-- Start image-carusel Area -->
			{{-- @include('user.layouts.slider')	 --}}

			@yield('content')
			
			<!-- End image-carusel Area -->
			

			<!-- Start callto-top Area -->
			{{-- @include('user.layouts.select')	 --}}
			
			<!-- End callto-top Area -->
			

			<!-- Start home-about Area -->
			{{-- @include('user.layouts.global')	 --}}
			
			<!-- End home-about Area -->
			

			<!-- Start video Area -->
			{{-- @include('user.layouts.video')	 --}}
			
			<!-- End video Area -->
			

			<!-- Start process Area -->
			{{-- @include('user.layouts.process')	 --}}
			
			<!-- End process Area -->
			

			<!-- Start testomial Area -->
			{{-- @include('user.layouts.testimonial')	 --}}
			
			<!-- End testomial Area -->						

			<!-- Start calltoaction Area -->
			{{-- @include('user.layouts.volunteer')	 --}}
			
			<!-- End calltoaction Area -->
			
			<!-- start footer Area -->		
			@include('user.layouts.footer')	
			
			<!-- End footer Area -->	
			@include('user.layouts.scripts')	
<script>
      @if(Session::has('message'))
                    var type = "{{ Session::get('alert-type', 'info') }}";
                    switch(type){
                        case 'info':
                            toastr.info("{{ Session::get('message') }}");
                            break;

                        case 'warning':
                            toastr.warning("{{ Session::get('message') }}");
                            break;

                        case 'success':
                            toastr.success("{{ Session::get('message') }}");
                            break;

                        case 'error':
                            toastr.error("{{ Session::get('message') }}");
                            break;
                    }
                  @endif
    </script>

    {{-- sweet alert --}}
     <script>
      $(document).on("click","#delete",function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                  window.location.href= link;
              }
            })
            });
    </script>
			
		</body>
	</html>