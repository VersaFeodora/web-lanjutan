@extends('layout')
@section('content')
<div class="m-5 p-3 card">
<form method="POST" action="{{route('products.store')}}">
    @csrf
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" name="code" id="code" class="form-control" />
        <label class="form-label" for="code">Product code</label>
      </div>
    </div>
    <div class="col form-outline">
        <select class="form-select" aria-label="Select one" name="cat" id="cat">
            <option value="Food">Food</option>
            <option value="Drink">Drink</option>
            <option value="Snack">Snack</option>
            <option value="Others">Others</option>
        </select>
        <label class="form-label" for="cat">Category</label>
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="name" name="name" class="form-control" />
    <label class="form-label" for="name">Product Name</label>
  </div>

    <!-- Text input -->
    <div class="form-outline mb-4">
    <input type="number" id="quantity" name="quantity" class="form-control" />
    <label class="form-label" for="quantity">Product Stock</label>
  </div>

    <!-- Text input -->
    <div class="form-outline mb-4">
    <input type="number" id="price" name="price" class="form-control" />
    <label class="form-label" for="price">Product Price</label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-info btn-block mb-4 text-white">Add Product</button>
  <a href="/" class="btn btn-danger btn-block mb-4 text-white">Cancel</a>
</form>
</div>