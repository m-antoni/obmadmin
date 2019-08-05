@extends('layouts.app')

@section('content')
		<form action="{{ route('testpost') }}" method="POST">
				@csrf
				<input type="text" name="user" class="form-control">
				<input type="text" name="email" class="form-control">
		</form>
@endsection