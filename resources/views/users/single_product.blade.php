@extends('layouts.app')

@section('content')
<div class="container">
    <section>
      <div class="row justify-content-center mb-5 mb-lg-0 no-gutters">
          <div class="col-md-4 text-center text-lg-left">

            @if($product->image == 'noimage.jpg')
                <img src="/img/noimage.jpg" alt="img" class="img-fluid">
            @else
                <img src="{{ asset('storage/' . $product->image) }}" alt="img" class="img-fluid">
            @endif

          {{-- <img class="img-fluid" src="/img/products/{{$product->image}}.jpg"> --}}
          </div>
          <div class="col-md-4">
              <div class="text-center">
                <div class="container">
                    <div class="card rounded-0">
                        <div class="card-body">
                             <div class="my-auto text-center text-lg-left mt-4">
                                <h5><b>{{ $product->p_name }}</b></h5>
                                
                                <p class="mb-0">Php <span id='price'>{{ $product->price }}</span> </p> 
                                  <small class="text-secondary"><strike>Php 500.00 </strike></small>
                               
                                <p class="p-1 text-center text-lg-left">
                                    {{$product->description}}
                                </p>
                                <div class="p-2">
                                     <a href="{{ route('order.cod', $product->id) }}">
                                    <button class="bttn bttn-jelly bttn-primary bttn-sm m-1">
                                        <i class="fa fa-truck"></i> 
                                        <small> COD</small>
                                        </button>
                                    </a>  

                                    <a href="{{ route('order.bank', $product->id) }}">
                                    <button class="bttn bttn-jelly bttn-warning bttn-sm m-1">
                                        <i class="fa fa-university"></i> 
                                        <small> PAY ON BANK</small>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
    </section>
</div>
@endsection