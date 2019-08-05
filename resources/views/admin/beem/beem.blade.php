@extends('layouts.app')

@section('admin-content')
<div class="container">
	  <div class="page-breadcrumb mb-3">
	    <nav aria-label="breadcrumb">
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item active" aria-current="page">Beem</li>
	        </ol>
	    </nav>
	  </div>
				
		@if(count($beem) > 0)
		 <table class="table table-hover table-striped">
			 	<thead>
			 			<tr>
						    <th>Name</th>
						    <th>Points</th>
						    <th>Used Card</th> 
						    <th>Date</th>
						    <th>Status</th>
						    <th>Action</th>
					  </tr>
			 	</thead>
				<tbody id="userTable">
						@foreach($beem as $row)
						  <tr>
						   		<td><a href="{{ route('admin.user.show', $row->user->id) }}">{{$row->user->getFullNameAttribute()}}</a></td>
						   		<td>{{$row->points}}</td>
						   		<td>{{$row->used_card}}</td>
						   		<td>{{$row->created_at->format('m-d-Y')}}</td>
						   		<td class="{{$row->status == true ? 'btn-success': 'btn-danger'}}">{{$row->status == true ? 'Approved': 'Pending'}}</td>
								  <td>
							   			<div class="dropdown">
												  <button class="btn btn-sm btn-dark btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												   <i class="fa fa-cog"></i>
												  </button>
												  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												    	<form action="{{route('admin.beem.update', $row->user_id)}}" method="POST">
											   					@csrf
											   					@method('PUT')

											   					<button type="submit" class="dropdown-item">APPROVED</button>
											   			</form>

												    <form action="#" method="POST">
												    	@csrf
												    	@method('DELETE')

												    	<input type="submit" class="dropdown-item" value="DELETE">
												    </form>
												  </div>
											</div>
								   	</td>
								</tr>
						@endforeach
				</tbody>
			</table>

					{{ $beem->links()}}
					
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