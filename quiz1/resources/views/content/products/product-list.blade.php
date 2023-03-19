@extends('layouts/contentNavbarLayout')

@section('title', 'Product List')

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
    <form class="d-flex" method="POST">
        @csrf
        <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit" method="post">Search</button>
    </form>
</div>
<div class="row my-3 d-flex justify-content-around">
    <button type="button" class="col-md-2 m-3 btn rounded-pill btn-secondary">Fruits</button>
    <button type="button" class="col-md-2 m-3 btn rounded-pill btn-secondary">Vegetables</button>
    <button type="button" class="col-md-2 m-3 btn rounded-pill btn-secondary">Spices</button>
    <button type="button" class="col-md-2 m-3 btn rounded-pill btn-secondary">Others</button>
</div>
<div class="row my-3">
    <div class="col-md-7 d-flex justify-content-start">
        <button type="button" class="d-flex justify-content-start btn btn-primary" href="{{route('add-products')}}">Add Product</button>
    </div>
    <div class="col-md-1 d-flex justify-content-end align-self-center">
        <label for="sortby" class="form-label">Sort by</label>
    </div>
    <div class="col-md-4 d-flex justify-content-end">
        <select id="sortprice" class="form-select form-select-sm">
            <option value="lth">Low to High</option>
            <option value="htl">High to Low</option>
        </select>
    </div>
</div>
<div class="row my-5">
    <h3>{{$content}}</h3>
    @foreach($products as $product)
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card h-100">
            <img class="card-img-top" src={{$product->file_path}} />
            <div class="card-body">
                <h5 class="card-title">{{$product->product_name}}</h5>
                <h7>{{$product->price}}</h7>
                <p class="text-muted" style="font-size: 12pt;">
                {{$user->username}}
                </p>
                <p class="card-text">
                    {{$product->description}}
                </p>
                <a href="javascript:void(0)" class="btn btn-outline-primary">Edit</a>
                <a href="javascript:void(0)" class="btn btn-outline-danger"><i class='bx bx-trash'></i></a>
            </div>
            </div>
        </div>
    @endforeach
@endsection