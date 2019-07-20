@extends('layouts.app')

@section('admin-content')
      <!-- ============================================================== -->
    <!-- basic form -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-breadcrumb mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.products') }}" class="breadcrumb-link">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.products.show', $product->id) }}" class="breadcrumb-link">Show</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Update Product</h4>

            </div>
            
            <div class="card-body">
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label>ID</label>
                            <input type="text" name="id" class="form-control rounded-0 @error('id') is-invalid @enderror" value="{{ old('id') ?? $product->id}}">

                            @error('id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label>Product Name</label>
                            <input type="text" name="p_name" class="form-control rounded-0 @error('p_name') is-invalid @enderror" value="{{ old('p_name') ?? $product->p_name}}">

                            @error('p_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   
                        </div>  

                        <div class="form-group col-sm-4">
                            <label>Model</label>
                            <input type="text" name="p_model" class="form-control rounded-0 @error('p_model') is-invalid @enderror" value="{{ old('p_model') ?? $product->p_model }}">

                            @error('p_model')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   
                        </div> 

                        <div class="form-group col-sm-4">
                            <label>Category</label>
                            <input type="text" name="p_category" class="form-control rounded-0 @error('p_category') is-invalid @enderror" value="{{ old('p_category') ?? $product->p_category }}">

                             @error('p_category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   
                        </div>
                    </div>
                  

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label>Description</label>
                            <textarea name="description" class="form-control form-control-lg rounded-0 @error('description') is-invalid @enderror" name="address" rows="2">{{ old('description') ?? $product->description}}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Quantity</label>
                            <input class="form-control rounded-0 @error('quantity') is-invalid @enderror" value="{{ old('quantity') ?? $product->quantity }}" type="text" name="quantity">
                         
                             @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="inputEmail">Price</label>
                            <input type="text" name="price"  class="form-control rounded-0 @error('price') is-invalid @enderror" value="{{ old('price') ?? $product->price}}">

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Upload Image</label>
                            <div class="input-group">
                                  {{-- <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                  </div> --}}
                                  <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input">
                                    <label class="custom-file-label">Choose file</label>
                                  </div>
                            </div> 

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror     
                        </div>
                    </div>

                    
                    <div class="form-group row mt-4">
                        <div class="col-sm-4">
                             <button type="submit" class="btn btn-block btn-primary rounded-0"><i class="fa fa-database"></i> Update Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection