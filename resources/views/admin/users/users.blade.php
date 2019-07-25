@extends('layouts.app')

@section('admin-content')
<div class="container">
	  <div class="page-breadcrumb mb-3">
	    <nav aria-label="breadcrumb">
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item active" aria-current="page">Users</li>
	        </ol>
	    </nav>
	  </div>
				
			@if(count($users) > 0)
		 <table class="table table-hover table-striped">
			  <tr>
			  		<th>ID</th>
				    <th>Name</th>
				    <th>Phone</th> 
				    <th>Email</th>
				    <th>Sign up</th>
				    <th>Action</th>
			  </tr>
		 
			  @foreach($users as $user)
					  <tr>
					  		<td>{{$user->id}}</td>
					   		<td><a href="{{ route('admin.user.show', $user->id) }}">{{$user->getFullNameAttribute()}}</a></td>
					   		<td>{{$user->phone}}</td>
					   		<td>{{$user->email}}</td>
					   		<td>{{$user->created_at->format('m-d-Y')}}</td>
							   <td>
						   				<div class="dropdown">
												  <button class="btn btn-sm btn-dark btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												   <i class="fa fa-cog"></i>
												  </button>
												  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												    {{-- <a class="dropdown-item" href="#">delete</a> --}}
												    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
												    	@csrf
												    	@method('DELETE')

												    	<input type="submit" class="dropdown-item" value="DELETE">
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