@extends('user.home')
@section('banner-title','সাধারণ কিছু রোগ ও তার প্রতিকার')
@section('content')
<section class="contact-page-area section-gap">
	<center>
		<div class="container" id="app">
			
				<div class="col-md-8">
					<h3>রোগ অনুসন্ধান করুন</h3>
				<form action="{{ route('find.cure') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="col-md-4 mt-2">
					<div class="form-group">
					    <label for="exampleFormControlSelect1">প্রাণীর নাম</label>
					    <select name="animal" v-model="animal" @click="find" class="form-control" id="animal">
					      	<option value=""></option>
					      	@if ($status==null)
					      		@foreach ($animals as $animal)
					      		<option value="{{ $animal->id }}" >{{ $animal->name }}</option>
					    		@endforeach
					    		
					      	@endif
					      	@if ($status!=null)
					      		@foreach ($animals as $animal)
					      		<option value="{{ $animal->id }}" >{{ $animal->name }}</option>
					    		@endforeach
					      	@endif
					    	
					    </select>
					  </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					    <label for="exampleFormControlSelect1">রোগের নাম</label>
					    <select class="form-control" name="disease">
					      		<option v-for="disease in disease"> @{{ disease }} </option>
					    </select>
					  </div>
				</div>
				<div class="col-md-4">
					<button type="submit" class="btn btn-success">অনুসন্ধান করুন</button>
				</div>
				</form>
			</div>
			
		</div>
		</center>
    	{{-- Post Section --}}
			<section class="post-content-area mt-3">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 posts-list">
							@foreach ($cures as $cure)
								@if($status != null)
								@foreach ($cure->animals as $a)
									@foreach ($cure->diseases as $d)
										@if ($a->id == $sanimal->id && $d->id == $sdisease->id)
											<div class="single-post row offset-3">
							
								<div class="col-lg-9 col-md-9 ">
										<h3>
											@foreach ($cure->diseases as $disease)
											@if ($loop->index > 0)
													,
												@endif
												{{ $disease->name }}
												
											@endforeach
										</h3>

										<h6 class="mb-2 mt-2">
											<i class='fas fa-cat'></i>
									@foreach ($cure->animals as $animal)
											@if ($loop->index > 0)
													,
												@endif
												{{ $animal->name }}
										
											@endforeach
										</h6>

									


									<p class="excert">

										{{ $cure->symptoms }}
									</p>
									<a href="{{ route('read',$cure->id) }}" class="primary-btn">View More</a>
								</div>
							</div>
										@endif
									@endforeach
								@endforeach

								@endif

								@if ($status == null )
								<div class="single-post row offset-3">
							
								<div class="col-lg-9 col-md-9 ">
										<h3>
											@foreach ($cure->diseases as $disease)
											@if ($loop->index > 0)
													,
												@endif
												{{ $disease->name }}
												
											@endforeach
										</h3>

										<h6 class="mb-2 mt-2">
											<i class='fas fa-cat'></i>
									@foreach ($cure->animals as $animal)
											@if ($loop->index > 0)
													,
												@endif
												{{ $animal->name }}
										
											@endforeach
										</h6>

									


									<p class="excert">

										{{ $cure->symptoms }}
									</p>
									<a href="{{ route('read',$cure->id) }}" class="primary-btn">View More</a>
								</div>
							</div>
								@endif
								
							@endforeach
																		
		                    <nav class="blog-pagination justify-content-center d-flex">
		                        <ul class="pagination">
		                        	@if($status == null)
										{{ $cures->links() }}
		                        
		                        @endif
		                            
		                        </ul>
		                    </nav>
						</div>
						
					</div>
				</div>	
			</section>
    	{{-- Post Section --}}
    </section>   
@endsection