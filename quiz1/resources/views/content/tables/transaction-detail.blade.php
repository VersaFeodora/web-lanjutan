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
<?php
$prod = $products->where('id', $transactions->product_id)->first();
$seller = $users->where('id', $prod->seller_id)->first();
$buyer = $users->where('id', $tranc->buyer_id)->first();
$total = $transactions->quantity * $prod->price;
?>
<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{$prod->file_path}}" alt="Card image cap" />
          </div>
        </div>
    </div>
    <div class="card col-md-8">
      <div class="card-body">
        <form method='POST' action="{{route('update-rating', $transactions->id)}}">
        @csrf
          <div class="mb-3">
            <h3>Transaction Detail</h3>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-name">Transaction Date</label>
            <h5>{{$tranc->transaction_date}}</h5>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Seller</label>
            <h5>{{$seller->username}}</h5>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Buyer</label>
            <h5>{{$buyer->username}}</h5>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Product Name</label>
            <h5>{{$prod->product_name}}</h5>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Product Description</label>
            <h5>{{$prod->description}}</h5>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Price</label>
            <h5>Rp{{$prod->price}}</h5>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Quantity</label>
            <h5>x{{$transactions->quantity}}</h5>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Total</label>
            <h5>Rp{{$total}}</h5>
          </div>
          @if($user->roles_id == 2)
          <div class="mb-3">
            <label class="form-label" for="basic-default-category">Rate</label>
            <select name="rating" class="form-select" id="exampleFormControlSelectCategory" aria-label="Default select example">
              @if($transactions->rating == 1)
                  <option selected value="1">⭐</option>
                  <option value="2">⭐⭐</option>
                  <option value="3">⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
              @elseif($transactions->rating == 2)
                  <option value="1">⭐</option>
                  <option selected value="2">⭐⭐</option>
                  <option value="3">⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
              @elseif($transactions->rating == 3)
                  <option value="1">⭐</option>
                  <option value="2">⭐⭐</option>
                  <option selected value="3">⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
              @elseif($transactions->rating == 4)
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
          <button type="submit" class="btn btn-primary">Update Rating</button>
          @else
          <div class="mb-3">
            <label class="form-label" for="basic-default-category">Rate</label>
            <select name="rating" class="form-select" id="exampleFormControlSelectCategory" aria-label="Default select example" disabled>
              @if($transactions->rating == 1)
                  <option selected value="1">⭐</option>
                  <option value="2">⭐⭐</option>
                  <option value="3">⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
              @elseif($transactions->rating == 2)
                  <option value="1">⭐</option>
                  <option selected value="2">⭐⭐</option>
                  <option value="3">⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
              @elseif($transactions->rating == 3)
                  <option value="1">⭐</option>
                  <option value="2">⭐⭐</option>
                  <option selected value="3">⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
              @elseif($transactions->rating == 4)
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
          @endif
        </form>
        <a href="{{route('transaction-tbl')}}"><button type="" class="btn btn-danger mt-3">Back</button></a>
      </div>
    </div>
  </div>
</div>
@endsection