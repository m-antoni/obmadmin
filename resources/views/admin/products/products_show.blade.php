@extends('layouts.app')

@section('admin-content')
		<div class="container">
				<div class="page-breadcrumb mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.products') }}" class="breadcrumb-link">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Show</li>
                </ol>
            </nav>
        </div>
				
				<div class="clearfix">
            <div class="float-left"></div>
             <div class="float-right">
			         <div class="btn-group" role="group">
										<a class="bttn bttn-primary bttn-fill bttn-sm" href="{{ route('admin.products.edit', $product->id) }}"><i class="fa fa-edit"></i> Edit</a>
								    <form action="{{ route('admin.products.delete', $product->id) }}" method="POST">
								    	@csrf
								    	@method('DELETE')
								    	<button type="submit" class="bttn bttn-danger bttn-fill bttn-sm"><i class="fa fa-trash"></i> Delete</button>
								    </form>
			          </div>
	       		</div>
        </div>
		
				<div class="card">
						<div class="card-body">
								<div class="row">
											<div class="col-sm-6">
													@if($product->image == 'noimage.jpg')
														<img src="{{ asset('/img/noimage.jpg') }}" alt="img" class="img-fluid rounded-0" style="width: 400px;">
													@else
														<img src="{{ $product->image }}" alt="img" class="img-thumbnail rounded-0" style="width: 400px;">
													@endif
											</div>
											<div class="col-sm-6 pt-3">
													<div class="card">	
														<div class="card-header bg-secondary text-white"><h4>ID: {{ $product->id }}</h4></div>
															<div class="card-body">
																		<h4 class="mb-3">Product: {{$product->p_name}}</h4>
																		<p>Description: {{$product->description}}</p>
																		<p>Price: ₱ {{$product->price}}</p>
																		<p>Old Price: <s>₱ {{$product->old_price}}</s></p>
															</div>
													</div>
											</div>
								</div>
						</div>
				</div>
		</div>
@endsection


@section('script')
	@if(session('success'))
		<script type="text/javascript">
				iziToast.success({
					  title: 'Success',
					  message: '{{session('success')}}',
					 	icon: 'ico-success',
					  // iconColor: 'rgb(0, 255, 184)',
					  // theme: 'dark',
					  // progressBarColor: 'rgb(0, 255, 184)',
					  position: 'topCenter',
					  transitionIn: 'fadeInLeft',
					  transitionOut: 'fadeOutUp'
				});
		</script>
	@endif
	
	@if(count($errors) > 0)
			@foreach($errors->all() as $error)
				<script type="text/javascript">
						iziToast.error({
							  title: 'Error',
							  message: '{{$error}}',
							 	icon: 'ico-warning',
							  // iconColor: 'rgb(0, 255, 184)',
							  // theme: 'dark',
							  // progressBarColor: 'rgb(0, 255, 184)',
							  position: 'topCenter',
							  transitionIn: 'fadeInLeft',
							  transitionOut: 'fadeOutUp'
						});
				</script>
			@endforeach
		@endif
@endsection