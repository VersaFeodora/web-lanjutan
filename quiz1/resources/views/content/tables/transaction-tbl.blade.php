@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Table')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Transaction
</h4>

<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">Transaction History</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Transaction Date</th>
            @if($user->roles_id == 1)
            <th>Buyer</th>
            @else
            <th>Seller</th>
            @endif
          <th>Product</th>
          <th>Total</th>
          <th>Rating</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach($transactions as $transaction)
        <tr>
          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$transaction->transaction_date}}</strong></td>
          <td>
            @if($user->roles_id == 1)
            <?php 
              $us = $users->where('id', $transaction->buyer_id)->first();
              $us = $us->username;
              echo $us;
            ?>
            @else
            <?php 
              $us = $products->where('id', $transaction->product_id)->first();
              $us = $us->seller_id;
              $us = $users->where('id', $us)->first();
              echo $us->username;
            ?>
            @endif
          </td>
          <td>
          <?php 
            $us = $products->where('id', $transaction->product_id)->first();
            $us = $us->product_name;
            echo $us;
          ?>
          </td>
          <td>
            <?php
              $us = $products->where('id', $transaction->product_id)->first();
              $price = $us->price;
              $total = $price * $transaction->quantity;
              echo $total;
            ?>
          </td>
          <td>
            <?php
              for($i = 1; $i<=$transaction->rating; $i++){
                echo '⭐';
              }
            ?>
          </td>
          <td><span class="badge bg-label-primary me-1">{{$transaction->status}}</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/order/download/{{$transaction->id}}"><i class="bx bx-edit-alt me-1"></i> Download PDF</a>
                <a class="dropdown-item" href="/order/detail/{{$transaction->id}}"><i class="bx bx-edit-alt me-1"></i> Detail</a>
                @if ($user->roles_id == 1)
                  @if($transaction->status == 'new')
                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Change to on delivery</a>
                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Reject</a>
                  @elseif ($transaction->status == 'on delivery')
                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Cancel</a>
                  @endif
                @else
                  @if($transaction->status == 'new')
                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Cancel</a>
                  @elseif ($transaction->status == 'on delivery')
                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Change to completed</a>
                  @endif
                @endif
              </div>
            </div>
          </td>
        </tr>
      @endforeach
      </tbody>
      </table>
@endsection
