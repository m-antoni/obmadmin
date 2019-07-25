@extends('layouts.app')


@section('admin-content')

	<div class="container">
  <div class="page-breadcrumb mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Products</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.products.create') }}" class="breadcrumb-link">Create</a></li>
            </ol>
        </nav>
    </div>

		<form action="{{ route('admin.products.import') }}" method="POST" enctype="multipart/form-data" class="mb-">
			@csrf
				<div class="clearfix">
						<div class="float-left">
								<div class="input-group">
							  		<div class="custom-file">
									    <input type="file" name="file" class="custom-file-input">
									    <label class="custom-file-label">Choose file</label>
									  </div>
								</div>
						</div>
						<div class="float-right">
								<div class="btn-group" role="group" aria-label="Basic example">
				      			<button class="bttn bttn-fill bttn-success bttn-sm">
				      					<i class="fa fa-file-excel"></i> 
				        			 IMPORT
				      			</button>

				          	<a href="{{ route('admin.products.export') }}">
				          			<button type="button" class="bttn bttn-fill bttn-danger bttn-sm">
				          					<i class="fa fa-download"></i> 
					          			 EXPORT
				          			</button>
				          	</a>
			        	</div>
						</div>
				</div>
     </form>

 @if(count($products) > 0)
		 <table class="table table-hover table-striped table-responsive-md">
		  <tr>
			    <th>ID</th>
			    <th>Product</th> 
			    <th>Description</th> 
			    <th>Price</th>
			    <th>Old Price</th>
			    <th>Action</th>
		  </tr>
		 
		  @foreach($products as $product)
			  <tr>
			   		<td>{{$product->id}}</td>
			   		<td><a href="{{ route('admin.products.show', $product->id) }}">{{$product->p_name}}</a></td>
			   		<td>{{$product->description}}</td>
			   		<td>{{$product->price}}</td>
			   		<td>{{$product->old_price}}</td>
			   		<td>
			   				<div class="dropdown">
								  <button class="btn btn-sm btn-dark btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								   <i class="fa fa-cog"></i>
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								    <a class="dropdown-item" href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
								    <form action="{{ route('admin.products.delete', $product->id) }}" method="POST">
								    	@csrf
								    	@method('DELETE')
								    	<input type="submit" class="dropdown-item" value="Delete">
								    </form>
								    
								  </div>
								</div>
			   		</td>
			  </tr>
			@endforeach
		</table>
		{{ $products->links()}}
	@else
	<h1>There is no data to show...</h1>
 	@endif
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