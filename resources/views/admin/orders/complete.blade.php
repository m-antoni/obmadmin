@extends('layouts.app')

@section('admin-content')

<div class="container">
  <div class="page-breadcrumb mb-3">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.order') }}">Orders</a></li>
              <li class="breadcrumb-item active" aria-current="page">Complete</li>
          </ol>
      </nav>
  </div>

 @if(count($complete) > 0)
		 <table class="table table-hover table-striped table-responsive-md">
		  <tr>
			    <th>User</th>
			    <th>Product</th> 
			    <th>Ref #</th>
			    <th>Qty</th>
			    <th>Price</th>
			    <th>Date</th>
			    <th>Action</th>
		  </tr>
		 
		  @foreach($complete as $row)
			  <tr>
			   		<td><a href="{{ route('admin.user.show', $row->user->id) }}">{{$row->user->getFullNameAttribute()}}</a></td>
			   		<td>{{$row->product->p_name}}</td>
			   		<td>{{$row->reference}}</td>
			   		<td>{{$row->quantity}}</td>
			   		<td>{{$row->price}}</td>
			   		<td>{{$row->date->format('m-d-Y')}}</td>
			   		<td>
			   				<div class="dropdown">
								  <button class="btn btn-sm btn-dark btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								   <i class="fa fa-cog"></i>
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">	
								    <form action="{{ route('admin.order.delete', $row->id) }}" method="POST">
									    	@csrf
									    	@method('DELETE')
									    	<button type="submit" class="dropdown-item">Delete</button>
										</form>				    
								  </div>
								</div>
			   		</td>
			  </tr>
			@endforeach
		</table>
		{{ $complete->links()}}
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
