@extends('layouts.app')

@section('admin-content')
	<div class="container">
		<div class="page-breadcrumb mb-3">
	    <nav aria-label="breadcrumb">
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.users')}}">Users</a></li>
	            <li class="breadcrumb-item active" aria-current="page">Show</li>
	        </ol>
	    </nav>
	  </div>

		<div class="row">
				<div class="col-md-6">
						<div class="card">
								<div class="card-body">
										<h2 class="text-secondary"><i class="fa fa-user-circle"></i> User Information</h2>
										<br>
										<h4>ID: {{$user->id}}</h4>
										<div>Full Name: {{$user->getFullNameAttribute()}}</div>
										<div>Phone: {{$user->phone}}</div>
										<div>Address: {{$user->address}}</div>
										<div>Email: {{$user->email}}</div>
										<div>Beem Bucks Activation: {{$user->beem_activation}}</div>
								</div>
						</div>
				</div>
		</div>
	</div>
@endsection
