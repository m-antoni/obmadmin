@extends('layouts.app')

@section('admin-content')
<div class="container">
	  <div class="page-breadcrumb mb-3">
	    <nav aria-label="breadcrumb">
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.users') }}">Users</a></li>
	            <li class="breadcrumb-item active" aria-current="page">Blocked</li>
	        </ol>
	    </nav>
	  </div>
				
			@if(count($block) > 0)
		 <table class="table table-hover table-striped col-6">
			  <tr>
			  		<th>ID</th>
				    <th>Name</th>
				    <th>Email</th>
				    <th>Action</th>
			  </tr>
		 
			  @foreach($block as $row)
					  <tr>
					  		<td>{{$row->id}}</td>
					   		<td><a href="{{ route('admin.user.show', $row->id) }}">{{$row->getFullNameAttribute()}}</a></td>
					   		<td>{{$row->email}}</td>
					   		<td>
							   			<div class="dropdown">
												  <button class="btn btn-sm btn-dark btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												   <i class="fa fa-cog"></i>
												  </button>
												  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												    <form action="{{ route('admin.users.delete', $row->id) }}" method="POST">
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

					{{ $block->links()}}
					
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