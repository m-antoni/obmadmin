@extends('layouts.app')

@section('content')
		
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        
            <div class="card mb-3">
                <div class="card-header bg-primary">
                     {{-- <a class="pt-2 d-inline-block" href="index.html">Order Summary</a> --}}
                    
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                           {{--  <h5 class="mb-3">To:</h5> --}}
                            <h4 class="text-dark mb-1"> {{ auth()->user()->name }}</h4>                   
                            <div> </div>
                            <div>Address: {{ auth()->user()->address }}</div>
                            <div>Email: {{ auth()->user()->email}}</div>
                            <div>Phone: {{ auth()->user()->phone }}</div>
                        </div>
                    </div>
                    <div class="table-responsive-md">
                    	@if(count($orders) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Ref No.</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    {{-- <th>Status</th> --}}
                                    {{-- <th>Payment</th> --}}
                                </tr>
                            </thead>

                            @foreach($orders as $order)
	                            <tbody>
	                                <tr>
	                                    <td>{{ $order->product->p_name}}</td>
	                                    <td>{{ $order->reference }}</td>
	                                    <td>{{ $order->quantity}}</td>
	                                    <td>{{ number_format($order->price) }}</td>
	                                    <td>{{ $order->date->format('m-j-Y') }}</td>
	                                    {{-- <td class="text-secondary">{{ $order->status }}</td> --}}
                                        {{-- <td>{{ $order->payment }}</td> --}}
	                                </tr>
	                            </tbody>
                            @endforeach
                        </table>
                        {{ $orders->links()}}	
	                 	@else
							<h1>You do not have orders...</h1>
	                 	@endif
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                        </div>
                        <div class="col-lg-4 col-sm-5 ml-auto">
                          
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-primary">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection