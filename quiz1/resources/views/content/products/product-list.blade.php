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
<?php use App\Models\TransactionDetails; use App\Models\Products;?>
<div class="row">
    <form class="d-flex" method="POST">
        @csrf
        <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit" method="post">Search</button>
        <div class="col-md-4 d-flex justify-content-end">
        <select id="sortprice" name="sortprice" class="form-select form-select-sm mx-1">
            <option value="none">Sort by Price:</option>
            <option value="asc">Low to High Price</option>
            <option value="dsc">High to Low Price</option>
        </select>
        <select id="sortrate" name="sortrate" class="form-select form-select-sm mx-1">
            <option value="none">Sort by Rate:</option>
            <option value="asc">Low to High Rate</option>
            <option value="dsc">High to Low Rate</option>
        </select>
    </div>
    </form>
</div>
<div class="row my-3 d-flex justify-content-around">
    <button type="button" class="col-md-2 m-3 btn rounded-pill btn-secondary" ><a href="/products/category/1" style="color: white;">Fruits</a></button>
    <button type="button" class="col-md-2 m-3 btn rounded-pill btn-secondary"><a href="/products/category/2" style="color: white;">Vegetables</a></button>
    <button type="button" class="col-md-2 m-3 btn rounded-pill btn-secondary"><a href="/products/category/3" style="color: white;">Spices</a></button>
    <button type="button" class="col-md-2 m-3 btn rounded-pill btn-secondary"><a href="/products/category/4" style="color: white;">Others</a></button>
</div>
<div class="row my-3">
    @if ($user->roles_id == 1)
        <div class="col-md-7 d-flex justify-content-start">
            <a href="{{route('add-products')}}"><button type="button" class="d-flex justify-content-start btn btn-primary">Add Product</button></a>
        </div>
    @endif
</div>
<div class="row my-5">
    <h3>{{$content}}</h3>
    @foreach($products as $product)
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card h-100">
            <img class="card-img-top" src={{$product->file_path}} />
            <div class="card-body">
                <h5 class="card-title">{{$product->product_name}}</h5>
                <p>
                <?php
                $rating = TransactionDetails::where('product_id', $product->id)->avg('rating');
                for($i = 1; $i <= $rating; $i++){
                    echo '⭐';
                }
                echo "\r\n";
                ?>
                </p>
                <h7>{{$product->price}}</h7>
                <p class="text-muted" style="font-size: 12pt;">
                @if($user->roles_id == 1)
                {{$user->username}}
                @else
                @php
                $seller = $users->where('id', $product->seller_id)->first();
                @endphp
                {{$seller->username}}
                @endif
                </p>
                <p class="card-text">
                    {{$product->description}}
                </p>
                @if ($user->roles_id == 1)
                    <a href="/products/edit/{{$product->id}}" class="btn btn-outline-primary">Edit</a>
                    <a href="{{route('delete-products', $product->id)}}" class="btn btn-outline-danger"><i class='bx bx-trash'></i></a>
                @else
                    <a href="/products/addToCart/{{$product->id}}" class="btn btn-outline-primary">Add to Cart</a>
                @endif
            </div>
            </div>
        </div>
    @endforeach
@endsection