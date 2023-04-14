@extends('layout')
@section('content')
<div class="m-5 p-3 card">
<form method="POST" action="{{route('products.update', $product->id)}}">
    @csrf
    @method('PUT')
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" name="code" id="id" class="form-control" value="{{$product->id}}" disabled/>
        <label class="form-label" for="id">Product ID</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" name="code" id="code" class="form-control" value="{{$product->product_code}}"/>
        <label class="form-label" for="code">Product code</label>
      </div>
    </div>
    <div class="col form-outline">
        <select class="form-select" aria-label="Select one" name="cat" id="cat">
            <option @if ($product->product_category == "Food") {{ 'selected' }} @endif value="Food">Food</option>
            <option @if ($product->product_category == "Drink") {{ 'selected' }} @endif value="Drink">Drink</option>
            <option @if ($product->product_category == "Snack") {{ 'selected' }} @endif value="Snack">Snack</option>
            <option @if ($product->product_category == "Others") {{ 'selected' }} @endif value="Others">Others</option>
        </select>
        <label class="form-label" for="cat">Category</label>
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="name" name="name" class="form-control" value="{{$product->product_name}}"/>
    <label class="form-label" for="name">Product Name</label>
  </div>

    <!-- Text input -->
    <div class="form-outline mb-4">
    <input type="number" id="quantity" name="quantity" class="form-control" value="{{$product->product_stock}}"/>
    <label class="form-label" for="quantity">Product Stock</label>
  </div>

    <!-- Text input -->
    <div class="form-outline mb-4">
    <input type="number" id="price" name="price" class="form-control" value="{{$product->price}}"/>
    <label class="form-label" for="price">Product Price</label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-info btn-block mb-4 text-white">Update Product</button>
  <a href="/" class="btn btn-danger btn-block mb-4 text-white">Cancel</a>
</form>
</div>