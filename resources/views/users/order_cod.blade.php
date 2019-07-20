@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="offset-md-3 col-md-6 col-sm-12 col-12">
			<div class="card mb-5">
				<div class="card-body">
					{{-- Validation errors --}}
			          @if($errors->any())
			              <div class="alert alert-danger alert-dismissible fade show" role="alert">
			                <strong><i class="fa fa-warning"></i> Error</strong> Something went wrong...
			                @foreach($errors->all() as $error)
			                    <ul>
			                      	<li>{{$error}}</li>
			                    </ul>
			                @endforeach
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                  <span aria-hidden="true">&times;</span>
			                </button>
			              </div>  
			          @endif

					<form method="POST" action="{{ route('product.cod', ['product_id' => $product->id]) }}">
						@csrf
						
						@include('partials.form')
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	

@endsection

@section('script')
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
@endsection