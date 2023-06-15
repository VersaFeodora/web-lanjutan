@extends('layouts/contentNavbarLayout')

@section('title', 'Detail Transaction')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{$product->file_path}}" alt="Card image cap" />
          </div>
        </div>
    </div>
    <div class="card col-md-8">
      <div class="card-body">
        <form method='POST' action="{{route('actionedit-products', $product->id)}}">
        @csrf
          <div class="mb-3">
            <h3>Transaction Detail</h3>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-name">Transaction Date</label>
            <h3>{{$tranc->transaction_date}}</h3>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Seller</label>
            <p>{{$seller->username}}</p>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Buyer</label>
            <p>{{$buyer->username}}</p>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Product Name</label>
            <h3>{{$prod->product_name}}</h3>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Product Description</label>
            <p>{{$prod->description}}</p>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Product Description</label>
            <p>{{$prod->description}}</p>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Price</label>
            <p>Rp{{$prod->price}}</p>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Quantity</label>
            <p>x{{$transactions->quantity}}</p>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Total</label>
            <p>x{{$total}}</p>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-category">Rate</label>
            <select name="category_id" class="form-select" id="exampleFormControlSelectCategory" aria-label="Default select example">
              @if($transactions->rate == 1)
                  <option selected value="1">⭐</option>
                  <option value="2">⭐⭐</option>
                  <option value="3">⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
              @elseif($transactions->rate == 2)
                  <option value="1">⭐</option>
                  <option selected value="2">⭐⭐</option>
                  <option value="3">⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
              @elseif($transactions->rate == 3)
                  <option value="1">⭐</option>
                  <option value="2">⭐⭐</option>
                  <option selected value="3">⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
              @elseif($transactions->rate == 4)
                  <option value="1">⭐</option>
                  <option value="2">⭐⭐</option>
                  <option value="3">⭐⭐⭐</option>
                  <option selected value="4">⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
              @else
                  <option value="1">⭐</option>
                  <option value="2">⭐⭐</option>
                  <option value="3">⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option selected value="5">⭐⭐⭐⭐⭐</option>
              @endif
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{route('products')}}"><button type="" class="btn btn-danger mt-3">Back</button></a>
      </div>
    </div>
  </div>
</div>
@endsection