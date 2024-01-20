@extends('layouts.internal.master')


@section('title')
Employee
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Employee /</span> Add
</h4>

<!-- Multi Column with Form Separator -->
<form method="POST" action="{{route('employees.store')}}" enctype="multipart/form-data">
  @csrf
  
  <div class="card mb-4">
    <div class="card-body">
      <h6>Employee Info</h6>
      <div class="row g-3">

        <div class="col-md-6">
          <label class="form-label" for="multicol-first-name">First name</label>
          <input type="text" id="fname" name="fname" class="form-control" placeholder="First name" required value="{{ old('fname') }}"/>
          @if ($errors->has('fname'))
            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('fname') }}</span></small>
          @endif
        </div>

        <div class="col-md-6">
          <label class="form-label" for="multicol-first-name">Last name</label>
          <input type="text" id="lname" name="lname" class="form-control" placeholder="Last name" required value="{{ old('lname') }}"/>
          @if ($errors->has('lname'))
            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('lname') }}</span></small>
          @endif
        </div>

        <div class="col-md-6">
          <label class="form-label" for="multicol-first-name">Birthday </label>
          <input type="date" id="birthdate" name="birthdate" class="form-control" required value="{{ old('birthdate') }}"/>
          @if ($errors->has('birthdate'))
            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('birthdate') }}</span></small>
          @endif
        </div>

        <div class="col-md-6">
          <label class="form-label" for="multicol-first-name">Contact </label>
          <input type="string" id="contact" name="contact" class="form-control" placeholder="Contact" required value="{{ old('contact') }}"/>
          @if ($errors->has('contact'))
            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('contact') }}</span></small>
          @endif
        </div>

        <div class="col-md-6">
          <label class="form-label" for="multicol-country">Sex</label>
          <select id="sex" class="select form-select" name="sex" data-allow-clear="true">
            <option value="">-</option>
            <option value="MALE" {{ old('sex') == 'MALE' ? 'selected' : '' }}>MALE</option>
            <option value="FEMALE" {{ old('sex') == 'FEMALE' ? 'selected' : '' }}>FEMALE</option>
          </select>
          @if ($errors->has('sex'))
            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('sex') }}</span></small>
          @endif
        </div>

        <div class="col-md-6">
          <label class="form-label" for="multicol-first-name">Image</label>
          <input type="file" id="image" name="image" class="form-control" required/>
          @if ($errors->has('image'))
            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('image') }}</span></small>
          @endif
        </div>

        <div class="col-md-12">
          <label class="form-label" for="multicol-first-name">Address </label>
          <input type="text" id="address" name="address" class="form-control" placeholder="Address" required value="{{ old('address') }}"/>
          @if ($errors->has('address'))
            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('address') }}</span></small>
          @endif
        </div>

      </div>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-body">
      <h6>User Info</h6>
    
      <div class="row g-3">

        <div class="col-md-6">
          <label class="form-label" for="multicol-first-name">Username</label>
          <input type="text" id="username" name="username" class="form-control" placeholder="username" required value="{{ old('username') }}"/>
          @if ($errors->has('username'))
            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('username') }}</span></small>
          @endif
        </div>

        <div class="col-md-6">
          <label class="form-label" for="multicol-first-name">Email</label>
          <input type="text" id="email" name="email" class="form-control" placeholder="email" required value="{{ old('email') }}"/>
          @if ($errors->has('email'))
            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('email') }}</span></small>
          @endif
        </div>

        <div class="col-md-6">
          <label class="form-label" for="multicol-first-name">Password</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required/>
          @if ($errors->has('password'))
            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('password') }}</span></small>
          @endif
        </div>

        <div class="col-md-6">
          <label class="form-label" for="multicol-first-name">Confirm Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
          @if ($errors->has('password_confirmation'))
            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('password_confirmation') }}</span></small>
          @endif
        </div>

      </div>

      <div class="pt-4">
        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
 
        <button type="button" class="btn btn-label-secondary" onclick="window.history.back()">Back</button>
      </div>

    </div>
  </div>
</form>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection