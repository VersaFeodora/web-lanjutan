@extends('layout')
@section('content')
<div class="m-5">
<div class="mb-3 d-flex justify-content-between align-content-stretch">
<div class="my-3">
  <a class="btn btn-info text-white fw-bold" href="/products/create" role="button"><i class="fa-solid fa-plus"></i>Add Product</a>
</div>
<form method="GET" action="{{route('index')}}">
  @csrf
  <div class="input-group rounded w-100 align-content-stretch">
    <input type="text" class="form-control rounded" name="search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
    <span class="input-group-text border-0" id="search-addon">
      <i class="fas fa-search"></i>
    </span>
  </div>
</form>
</div>
<table class="table table-hover align-middle mb-0 bg-white">
  <thead style="background-color: #c4eddf ">
    <tr>
      <th>ID</th>
      <th>Code</th>
      <th>Product Name</th>
      <th>Category</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <td>
        <p>{{$product->id}}</p>
      </td>
      <td>
        <p class="fw-normal mb-1">{{$product->product_code}}</p>
      </td>
      <td>
        <p class="fw-bold mb-1">{{$product->product_name}}</p>
      </td>
      <td>
        <p class="fw-normal mb-1">{{$product->product_category}}</p>
      </td>
      <td>
        <p class="fw-normal mb-1">{{$product->product_stock}}</p>
      </td>
      <td>
        <p class="fw-normal mb-1">{{$product->price}}</p>
      </td>
      <td>
        <div>
        <a href="{{route('products.show',$product->id)}}" class="btn btn-warning btn-block mb-4 text-white"><i class="fa-solid fa-pen-to-square"></i></a>
        <form action="{{route('products.destroy',$product->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-block mb-4 text-white"><i class="fa-solid fa-trash-can"></i></button>
        </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>