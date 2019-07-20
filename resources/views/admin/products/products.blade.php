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

		<form action="{{ route('admin.products.import') }}" method="POST" enctype="multipart/form-data">
			@csrf
		{{-- 	<div class="col-4">
				<input type="file" name="file" class="form-control">
			</div>
			 --}}
				<div class="col-sm-3 p-0 mb-2">
						<div class="input-group">
							  {{-- <div class="input-group-prepend">
							    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
							  </div> --}}
							  <div class="custom-file">
							    <input type="file" name="file" class="custom-file-input">
							    <label class="custom-file-label">Choose file</label>
							  </div>
						</div>
				</div>
				<div class="btn-group" role="group" aria-label="Basic example">
          	<button class="btn btn-success rounded-0">
	          		<i class="fa fa-file-excel"></i> 
	          		IMPORT FILE
	          </button>
          	<a href="{{ route('admin.products.export') }}" class="btn btn-danger rounded-0">
	          		<i class="fa fa-download"></i> 
	          			 EXPORT FILE
          	</a>
        </div>
     </form>

 @if(count($products) > 0)
		 <table class="table table-hover table-striped">
		  <tr>
			    <th>ID</th>
			    <th>Item</th> 
			    <th>Model</th>
			    <th>Category</th>
			    <th>Description</th>
			    <th>Qty</th>
			    <th>Price</th>
			    <th>Action</th>
		  </tr>
		 
		  @foreach($products as $product)
			  <tr>
			   		<td>{{$product->id}}</td>
			   		<td><a href="{{ route('admin.products.show', $product->id) }}">{{$product->p_name}}</a></td>
			   		<td>{{$product->p_model}}</td>
			   		<td>{{$product->p_category}}</td>
			   		<td>{{$product->description}}</td>
			   		<td>{{$product->quantity}}</td>
			   		<td>{{$product->price}}</td>
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