@extends('layouts.app')

@section('admin-content')

<div class="container-fluid">
  <div class="page-breadcrumb mb-3">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
          		<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.order') }}">Orders</a></li>
           		<li class="breadcrumb-item active" aria-current="page">
              		<a href="{{ route('admin.order.complete') }}">Complete</a>
              	</li>
              	<li class="breadcrumb-item active" aria-current="page">Show</li>
          </ol>
      </nav>
  </div>
		
  <h4>To: {{$order->user->getFullNameattribute()}}</h4>
  <div class="row mt-3">
  		<div class="col-md-4">
		  	<ul class="list-group">
		  		@foreach($order->cart->items as $item)
			  		<li class="list-group-item border-danger">
			  			<div><b>Item:</b> {{$item['item']['p_name']}}</div>
						<div><b>Quantity:</b> {{$item['qty']}}  &nbsp; <b>Price:</b> Php {{number_format($item['price'])}}</div>
			  		</li>	
		  		@endforeach	
		  	</ul>
	  	</div>
	  	<div class="col-md-4 offset-1">
	  		<ul class="list-group">
	  			<li class="list-group-item border-info">
	  				<div>User ID: <a href="{{route('admin.user.show', $order->user_id)}}">Click Here: {{$order->user_id}}</a></div>
	  				<div><i class="fa fa-phone"></i> {{$order->phone}}</div>
	  				<div><i class="fa fa-home"></i> {{$order->address}}</div>
	  				<div><b>Status: <span class="text-{{$order->status == 'PENDING' ? 'secondary' : 'success'}}">{{$order->status}}</span></b></div>
	  			</li>
	  			<li class="list-group-item border-info">
	  				<div><b>Total Quanity:</b> {{$order->cart->totalQty}}</div>
	  				<div><b>Total Price:</b> Php {{number_format($order->cart->totalPrice)}}</div>
	  			</li>
	  		</ul>
	  	</div>
  </div>
</div>
@endsection