@extends('layouts/contentNavbarLayout')

@section('title', 'Add Product')

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
    @csrf
    <div class="col-md-4">
        <div class="mb-3">
          <div class="card h-100">
            <img class="card-img-top" src="{{$product->file_path}}" alt="Card image cap" />
          </div>
        </div>
    </div>
    <div class="card col-md-8">
      <div class="card-body">
        <form>
          <div class="mb-3">
            <label class="form-label" for="basic-default-name">Product Name</label>
            <input type="text" class="form-control" id="basic-default-name" value="{{$product->product_name}}"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">File Path</label>
            <input type="text" class="form-control" id="basic-default-filepath" value="{{$product->file_path}}"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-category">Category</label>
            <select class="form-select" id="exampleFormControlSelectCategory" aria-label="Default select example">
              @if($product->category_id == 1)
                  <option selected value="1">Fruits</option>
                  <option value="2">Vegetables</option>
                  <option value="3">Spices</option>
                  <option value="4">Others</option>
              @elseif($product->category_id == 2)
                  <option value="1">Fruits</option>
                  <option selected value="2">Vegetables</option>
                  <option value="3">Spices</option>
                  <option value="4">Others</option>
              @elseif($product->category_id == 3)
                  <option value="1">Fruits</option>
                  <option value="2">Vegetables</option>
                  <option selected value="3">Spices</option>
                  <option value="4">Others</option>
              @else
                  <option value="1">Fruits</option>
                  <option value="2">Vegetables</option>
                  <option selected value="3">Spices</option>
                  <option value="4">Others</option>
              @endif
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-stock">Stock</label>
            <input type="number" id="basic-default-stock" class="form-control phone-mask" value="{{$product->product_stock}}"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-price">Price</label>
            <input type="number" id="basic-default-price" class="form-control phone-mask" value="{{$product->price}}"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-desc">Description</label>
            <input type="text" id="basic-default-desc" class="form-control" value="{{$product->description}}"></input>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{route('products')}}"><button type="" class="btn btn-danger mt-3">Back</button></a>
      </div>
    </div>
  </div>
</div>
@endsection