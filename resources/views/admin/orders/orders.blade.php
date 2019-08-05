@extends('layouts.app')

@section('admin-content')

<div class="container-fluid">
  <div class="page-breadcrumb mb-3">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
          		<li class="breadcrumb-item active" aria-current="page">Orders</li>
             	<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.order.complete') }}">Completed</a></li>
          </ol>
      </nav>
  </div>

 @if(count($orders) > 0)
 	<a href="{{ route('admin.order.export') }}">
		<button type="button" class="bttn bttn-fill bttn-danger bttn-sm">
				<i class="fa fa-download"></i> 
			 EXPORT
		</button>
	</a>
	<table class="table table-hover table-striped table-responsive-md">
	 	<thead>
	 		<tr>
			    <th>User</th>
			    <th>Order No</th>
			    <th>Phone</th>
			    <th>Address</th>
			    <th>Status</th>
			    <th>Payment</th>
			    <th>Date</th>
			    <th>Action</th>
	  		</tr>
	 	</thead>
	 	<tbody id="ordersTable">
			 	@foreach($orders as $row)
				  <tr>
				   		<td><a href="{{ route('admin.order.invoice', $row->id)}}"><i class="fa fa-eye"></i> {{$row->user->getFullNameAttribute()}}</a></td>
				   		<td>{{$row->order_number}}</td>
				   		<td>{{$row->phone}}</td>
				   		<td>{{$row->address}}</td>
				   		<td class="{{($row->status == 'PENDING') ? 'bg-danger' : 'bg-success'}} text-white">{{$row->status}}</td>
				   		<td>{{$row->payment}}</td>
				   		<td>{{$row->date->format('m-d-Y')}}</td>
				   		<td>
		   					<div class="dropdown">
								  <button class="btn btn-sm bg-dark btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								   <i class="fa fa-cog"></i>
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				  					<form action="{{ route('admin.order.update', $row->id) }}" method="POST">
								    	@csrf
								    	@method('PUT')
								    	<button type="submit" class="dropdown-item">Update</button>
								    </form>		
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
	 	</tbody>
	</table>
	{{ $orders->links()}}
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
