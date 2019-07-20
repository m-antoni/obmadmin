<div class="modal fade" id="placeordermodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Place Your Order</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form  method="POST" action="{{ route('placeorder') }}">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Delivery Address:</label>
            <textarea name="address"  class="form-control @error('address') is-invalid @enderror" rows="3" required>{{ old('address') }}</textarea>
                                
              @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>

           <div class="form-group">
                <label>City/Municipality</label>
                    <select name="city" class="form-control  @error('city') is-invalid @enderror" required>
                          <option value="" disabled>Choose here...</option>
                          <option>Metro Manila</option>
                          <option>Albay City</option>
                          <option>Cebu City</option>
                          <option>Davao City</option>
                    </select>
                    
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>


            <div class="form-group">
              <h5>Quantity</h5>
              <select name="quantity" class="form-control  @error('quantity') is-invalid @enderror" id="quantity" onchange="updateTotal()" required>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
              </select>
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-block">Place Order</button>
      </form>
      </div>
    </div>
  </div>
</div>