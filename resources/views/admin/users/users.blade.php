@extends('layouts.app')

@section('admin-content')
<div class="container">
	  <div class="page-breadcrumb mb-3">
	    <nav aria-label="breadcrumb">
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item active" aria-current="page">Users</li>
	            <li class="breadcrumb-item active" aria-current="page">Pending</li>
	            <li class="breadcrumb-item active" aria-current="page">Cash on Delivery</li>
	            <li class="breadcrumb-item active" aria-current="page">Pay On Bank</li>
	            <li class="breadcrumb-item active" aria-current="page">Block Users</li>
	           {{--  <li class="breadcrumb-item"><a href="{{ route('admin.products.create') }}" class="breadcrumb-link">Create</a></li> --}}
	        </ol>
	    </nav>
	  </div>
				
			@if(count($users) > 0)
		 <table class="table table-hover table-striped">
			  <tr>
				    <th>Name</th> 
				    <th>Phone</th>
				    <th>Address</th>
				    <th>City</th>
				    <th>Email</th>
				    <th>Action</th>
			  </tr>
		 
			  @foreach($users as $user)
					  <tr>
					   		<td>{{$user->name}}</td>
					   		<td>{{$user->phone}}</td>
					   		<td>{{$user->address}}</td>
					   		<td>{{$user->city}}</td>
					   		<td>{{$user->email}}</td>
							   <td>
						   				<div class="dropdown">
												  <button class="btn btn-sm btn-dark btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												   <i class="fa fa-cog"></i>
												  </button>
												  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												    <a class="dropdown-item" href="#">delete</a>
												    <form action="#" method="POST">
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

					{{ $users->links()}}
					
				@else

				<h1>There is no data to show...</h1>

			 	@endif
</div>

@endsection