
@extends('layouts.landing.master')

@section('title')
   Profile
@endsection'



@section('content')

@if(session('reload'))
    <script>
        location.reload(true);
    </script>
@endif

<div class="container">
    <div class="layout-page">
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">

                @include('customer.profile.profileHeader')

                <div class="row">

                    @include('customer.profile.aboutUser')

                    <!-- Deceased Content -->
                    <div class="col-xl-8 col-lg-7 col-md-7 dead-0 dead-md-1">
                        <div class="card card-action mb-4">
                            <div class="card-header align-items-center">
                                <h5 class="card-action-title mb-0">Change Password</h5>
                            </div>

                            <div class="card-body">
                                <form class="card-body" method="POST" action="{{ route('customer.updateUser', $user->id) }}" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf

                                    <h6 class="mb-0">User Information</h6>

                                    <small><code><strong>username</strong> and <strong>email</strong> are editable, just leave the other field as blank.</code></small>
                                    @if(session('message'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                        {{ session('message') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        </button>
                                        </div>
                                    @endif
                                    <div class="row g-3 mt-2">
                                    
                                    <div class="col-md-8">
                                        <label class="form-label" for="multicol-first-name">Username</label>
                                        <input type="text" id="username" name="username" class="form-control" placeholder="username" required value="{{old('username', $user->username) }}"/>
                                        @if ($errors->has('username'))
                                        <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('username') }}</span></small>
                                        @endif
                                    </div>

                                    <div class="col-md-8">
                                        <label class="form-label" for="multicol-first-name">Email</label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="email" required value="{{old('email', $user->email) }}"/>
                                        @if ($errors->has('email'))
                                        <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('email') }}</span></small>
                                        @endif
                                    </div>

                                    <div class="col-md-8">
                                        <label class="form-label" for="multicol-first-name">Old Password</label>
                                        <input type="password" id="oldpass" name="oldpass" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                                        @if ($errors->has('oldpass'))
                                        <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('oldpass') }}</span></small>
                                        @endif
                                    </div>

                                    <div class="col-md-8">
                                        <label class="form-label" for="multicol-first-name">New Password</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                                        @if ($errors->has('password'))
                                        <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('password') }}</span></small>
                                        @endif
                                    </div>

                                    <div class="col-md-8">
                                        <label class="form-label" for="multicol-first-name">Confirm Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                                        @if ($errors->has('password_confirmation'))
                                        <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('password_confirmation') }}</span></small>
                                        @endif
                                    </div>

                                    </div>
                                    <div class="pt-4">

                                    <button type="submit" class="btn btn-primary me-sm-1 me-1">Submit</button>
                                    <a href="{{ route('customer.profile', $user->customer->id) }}" class="btn btn-label-secondary">Back</a>
                                </form>

                                </div>

                        </div>

                    </div>
                    </div>
                    <!--/ Deceased Content -->


            </div>
        </div>
    </div>
</div>

@endsection