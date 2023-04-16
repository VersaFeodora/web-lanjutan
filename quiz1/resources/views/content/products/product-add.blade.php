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
    <div class="">
    <div class="card">
      <div class="card-body">
        <form method="POST" action="{{route('actionadd-products')}}">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-name">Product Name</label>
            <input type="text" name="product_name" class="form-control" id="basic-default-name"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">File Path</label>
            <input type="text" name="file_path" class="form-control" id="basic-default-filepath"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-category">Category</label>
            <select name="category_id" class="form-select" id="exampleFormControlSelectCategory" aria-label="Default select example">
                  <option selected value="1">Fruits</option>
                  <option value="2">Vegetables</option>
                  <option value="3">Spices</option>
                  <option value="4">Others</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-stock">Stock</label>
            <input name="product_stock" type="number" id="basic-default-stock" class="form-control phone-mask"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-price">Price</label>
            <input name="price" type="number" id="basic-default-price" class="form-control phone-mask"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-desc">Description</label>
            <textarea name="description" id="basic-default-desc" class="form-control"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
        </form>
        <a href="{{route('products')}}"><button type="" class="btn btn-danger mt-3">Back</button></a>
      </div>
    </div>
  </div>
</div>
@endsection