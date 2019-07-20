@extends('layouts.app')

@section('content')
	<div class="container">
			<div class="row justify-content-center">
					<div class="col-md-4 col-8">
							<form action="{{ route('create-paypal') }}" method="POST">
								@csrf
								
								<img src="/img/logo.jpeg" class="img-fluid" alt="logo">
								<div class="form-group">
									<label>Name</label>
									<input type="text" class="form-control rounded-0" name="name" value="{{ auth()->user()->name }}" disabled>
								</div>

								<div class="form-group">
										<input type="text" value="{{$product->p_name}}" class="form-control" disabled>	
								</div>	

								<div class="form-group">
								    <div class="row justify-content-center">
								          <div class="col-md-6 mb-2">
								              <label>Quantity</label>
								              <input class="form-control rounded-0" type="number" name="quantity" min="1" max="99" value="1" id="quantity" onchange="updateTotal()">
								              <input type="text" name="price" id="totalhidden" class="form-control" value="{{$product->price}}" hidden>
								              <input type="hidden" name="price" value="{{$product->price}}" disabled>
								          </div>
								              
								          <div class="col-md-6">
								              <label>Total Amount</label>
								              <h5>Php <span id="total"><b>{{ $product->price }}</b></span></h5>
								          </div>
								    </div>
								</div>

								<hr>
								<div>
								  	<button type="submit" class="btn btn-primary btn-block btn-lg rounded-0 mb-2"> 
								      		PAY ON PAYPAL
								    </button>

								  	<a href="{{ route('products') }}" class="btn btn-danger btn-lg btn-block rounded-0">Cancel</a>	
								</div>
								
							</form>	
					</div>
			</div>
	</div>
@endsection

<script>
      function getTotal(){
          document.getElementById('total').innerHTML = "{{ $product->price }}";  
      }
      
      getTotal();

      function updateTotal(){
          let quantity = document.getElementById('quantity').value;
          let price = parseInt({{$product->price}});

          total = document.getElementById('totalhidden').value = quantity * parseFloat(price);  

          if(total == '' & total == null){
              document.getElementById('total').value = "{{ $product->price }}";
          }else{
              document.getElementById('total').innerHTML = quantity * parseFloat(price);
          }   
      }
  </script>