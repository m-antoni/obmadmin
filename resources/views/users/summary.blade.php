@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="clearfix pb-2">
                <div class="float-left"></div>
                  <div class="float-right">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('myorders') }}">
                        <button class="bttn bttn-fill bttn-danger bttn-sm">
                            <i class="fa fa-clipboard-check"></i> ORDERS
                            </button>
                        </a>
                        
                        <a href="{{ route('products') }}">
                        <button class="bttn bttn-fill bttn-primary bttn-sm">
                            <i class="fa fa-shopping-cart"></i> 
                            </button>
                        </a>
                    </div>
                  </div>
            </div>

            <div class="card">
                <div class="card-header p-3">
                     {{-- <a class="pt-2 d-inline-block" href="index.html">Order Summary</a> --}}
                    <div class="float-left"> 
                        <h5>Order Summary</h5>
                        Payment: {{ strtoupper($order->payment)}}
                    </div>   
                    <div class="float-right"> 
                        <h5 >Ref No: {{$order->reference}}</h5>
                        Date: {{ $order->date->format('m-j-Y') }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h4 class="text-dark mb-1">{{ $order->user->name }}</h4>                   
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th class="right">Unit Cost</th>
                                    <th class="center">Qty</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="left strong">{{ $order->product->p_name}}</td>
                                    <td class="right">₱ {{$order->product->price}}</td>
                                    <td class="center">{{ $order->quantity }}</td>
                                    <td class="right">₱ {{ $order->price }}</td>
                                </tr>
                                <tr>
                                    <td><td>
                                    <td><b>Subtotal</b></td>
                                    <td>₱ {{ $order->price }}</td>
                                </tr>
              {{--                   <tr>
                                    <td><td>
                                    <td><b>Shipping</b></td>
                                    <td>{{(auth()->user()->city == 'Metro Manila')? 'FREE' : ''}}</td>
                                </tr> --}}
                                <tr>
                                    <td><td>
                                    <td><b>Total</b></td>
                                    <td>₱ {{ $order->price }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer bg-secondary">
                    <p class="text-justify text-white">
                        @if($order->payment == 'cod')
                            Note: FREE SHIPPING only around Metro Manila, your items will be delivered 3 to 5 days upon purchase.
                            for any assitance please call us. 1209-3084-3948
                        @else
                            Note: You may deposit your payment to our exclusive <a href="#" class="text-warning" data-toggle="modal" data-target="#bankaccount">bank accounts</a>, please dont forget to include your REFERENCE NO.
                            or your transaction may void. for any assitance please call us. 1209-3084-3948
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="bankaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Exclusive Bank Accounts</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                
            <h4 align="center">BDO: 123-456-7890</h4>
            <h4 align="center">SECURITY BANK: 123-456-7890</h4>
            <h4 align="center">BPI: 123-456-7890</h4>
                
          </div>
      {{--     <div class="modal-footer text-center">
                
          </div> --}}
      </div>
    </div>
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
@endsection