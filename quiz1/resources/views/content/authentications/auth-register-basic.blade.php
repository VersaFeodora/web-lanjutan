@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div class="container m-5 d-flex justify-content-center">
<div class="row p-5">
  <div class="col-md-12">
    <div class="card mb-4 p-5">
      <h1 class="text-center">AGRO</h1>
      <h3 class="text-center card-header">Sign up Before Continue</h3>
      <!-- Account -->
      
      <div class="card-body">
        <form id="formAccountSettings" method="POST" action="{{ route('action-register') }}">
          @csrf
          <div class="row">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input class="form-control" type="text" id="username" name="username" value="" autofocus />
            </div>
            <div class="mb-3 col-md-6">
              <label for="first_name" class="form-label">First Name</label>
              <input class="form-control" type="text" id="first_name" name="first_name" value="" autofocus />
            </div>
            <div class="mb-3 col-md-6">
              <label for="last_name" class="form-label">Last Name</label>
              <input class="form-control" type="text" name="last_name" id="last_name" value="" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="email" class="form-label">E-mail</label>
              <input class="form-control" type="text" id="email" name="email" value="" placeholder="john.doe@example.com" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="role" class="form-label">Role</label>
              <input class="form-control" type="text" id="role" name="roles" value="" placeholder="1-Supplier, 2-Customer" />
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label" for="phonenumber">Phone Number</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">ID (+62)</span>
                <input type="text" id="phoneNumber" name="phonenumber" class="form-control" placeholder="811 123 456 78" value=""/>
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <div class="form-password-toggle">
                <label class="form-label" for="basic-default-password12">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="basic-default-password12" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password2"/>
                  <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Address"/>
            </div>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Register</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
    </div>
    <div>
      <p class="text-center">
            <span>Already have an account?</span>
            <a href="{{route('login')}}">
              <span>Sign in instead</span>
            </a>
          </p>
    </div>
  </div>
</div>
  </div>
</div>
</div>
</div>
@endsection
