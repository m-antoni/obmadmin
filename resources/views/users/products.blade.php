@extends('layouts.app')

@section('content')

<div class="container">
		<div class="row justify-content-center">
				@if(count($products) > 0)
						@foreach($products as $row)
							<div class="col-md-3 col-sm-4 col-6 mb-4">
									<div>
											@if($row->image == 'noimage.jpg')
													<img src="/img/noimage.jpg" alt="img" class="img-thumbnail rounded-0">
											@else
													<img src="{{ asset('storage/' . $row->image) }}" alt="img" class="img-thumbnail rounded-0" style="width: 400px;">
											@endif
									</div>
									<div class="p-1">
										<div id="productName">{{$row->p_name}}</div>
										<div id="productPrice">₱ {{number_format($row->price)}} <small><s>₱ 2499</s></small></div>
								
                     <a href="{{ route('single.product', $row->id) }}">
                      		<button class="bttn-block bttn-jelly bttn-sm bttn-primary">
                          <i class="fa fa-shopping-cart"></i> 
                           	<small>ORDER NOW</small>
                          </button>
                      </a>
									</div>
							</div>	
						@endforeach
				@endif
		</div>

		<div class="row">
				<div class="col-md-3 col-sm-4 col-6 mb-4">
						{{ $products->links() }}
				</div>	
		</div>
</div>

@endsection


