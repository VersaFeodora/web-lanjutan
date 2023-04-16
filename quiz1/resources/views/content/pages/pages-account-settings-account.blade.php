@extends('layouts/contentNavbarLayout')

@section('title', 'Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Profile Details</h5>
      <!-- Account -->
      <div class="card-body">
        <form id="formAccountSettings" method="POST" action="{{route('update-acc')}}">
          @csrf
          <div class="row">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input class="form-control" type="text" id="username" name="username" value="{{$user->username}}" autofocus />
            </div>
            <div class="mb-3 col-md-6">
              <label for="firstName" class="form-label">First Name</label>
              <input class="form-control" type="text" id="firstName" name="firstName" value="{{$user->first_name}}" autofocus />
            </div>
            <div class="mb-3 col-md-6">
              <label for="lastName" class="form-label">Last Name</label>
              <input class="form-control" type="text" name="lastName" id="lastName" value="{{$user->last_name}}" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="email" class="form-label">E-mail</label>
              <input class="form-control" type="text" id="email" name="email" value="{{$user->email}}" placeholder="john.doe@example.com" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="role" class="form-label">Role</label>
              <select class="form-select" id="exampleFormControlSelect1" name="roles" aria-label="Default select example">
                @if ($user->roles_id == 1)
                  <option selected value="1">Supplier</option>
                  <option value="2">Customer</option>
                @else
                  <option value="1">Supplier</option>
                  <option selected value="2">Customer</option>
                @endif
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label" for="phoneNumber">Phone Number</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">ID (+62)</span>
                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="811 123 456 78" value="{{$user->phonenumber}}"/>
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <div class="form-password-toggle">
                <label class="form-label" for="basic-default-password12">Password</label>
                <div class="input-group">
                  <input name="password" type="password" class="form-control" id="basic-default-password12" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password2" value="{{$user->password}}"/>
                  <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{$user->address}}"/>
            </div>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
    </div>
    <div class="card">
      <h5 class="card-header">Delete Account</h5>
      <div class="card-body">
        <div class="mb-3 col-12 mb-0">
          <div class="alert alert-warning">
            <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
          </div>
        </div>
        <div>
          <button class="btn btn-danger deactivate-account"><a style="color:white;" href="{{route('del-acc')}}">Deactivate Account</a></button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
