<img src="/img/logo.jpeg" class="img-fluid" alt="logo">
<div class="form-group">
	<label>Name</label>
	<input type="text" class="form-control rounded-0" name="name" value="{{ auth()->user()->name }}" disabled>
</div>

<div class="form-group">
	<label>Phone</label>
	<input type="text" class="form-control rounded-0 @error('phone') is-invalid @enderror" name="phone" value="{{ auth()->user()->phone}}">
 
 	  @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
	<label>Delivery Address</label>
	<textarea name="address" class="form-control rounded-0 @error('address') is-invalid @enderror" name="address" rows="2">{{ auth()->user()->address}}</textarea>
	
	  @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror	
</div>

<div class="form-group">
	<label>City</label>
	<select name="city" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}">
	    <option>Metro Manila</option>
        <option>Bulacan</option>
        <option>Bacolod</option>
        <option>Cebu</option>
        <option>Cavite</option>
        <option>Pampanga</option>
        <option>Dumaguete</option>
        <option>Baguio</option>
        <option>Vigan</option>
        <option>Puerto Princesa</option>
        <option>Lucena</option>
        <option>Dipolog</option>
        <option>Batangas</option>
        <option>Tarlac</option>
        <option>Surigao</option>
        <option>Davao</option>
        <option>Others</option>
	</select>
	
	@error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror	
</div>

<div class="form-group">
    <div class="row justify-content-center">
          <div class="col-md-6 mb-2">
              <label>Quantity</label>
              <input class="form-control rounded-0" type="number" name="quantity" min="1" max="99" value="1" id="quantity" onchange="updateTotal()">
              <input type="text" name="price" id="totalhidden" class="form-control" value="{{$product->price}}" hidden>
          </div>
              
          <div class="col-md-6">
              <label>Total Amount</label>
              <h5>Php <span id="total"><b>{{ $product->price }}</b></span></h5>
          </div>
    </div>
</div>
<hr>
<div>
  	<a href="" class="btn btn-primary btn-block btn-lg rounded-0 mb-2" 
  	data-toggle="modal" data-target="#confirmModal"> 
      <small>PLACE YOUR ORDER</small>
    <a>

  	<a href="{{ route('products') }}" class="btn btn-danger btn-block btn-lg rounded-0">
        <small><i class="fa fa-times"></i> Cancel</small>
    <a>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
            <img src="/img/logo.jpeg" class="img-fluid" alt="logo">
		      <hr>

            <button type="submit" class="btn btn-primary btn-block btn-lg rounded-0"><i class="fa fa-check"></i> Confirm</button>

		      </div>
		      <div class="modal-footer">
		        	{{-- <p>DC GROUP OF COMPANIES</p> --}}
		      </div>
	    </div>
  	</div>
</div>
