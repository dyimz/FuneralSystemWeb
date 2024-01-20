@extends('layouts.internal.master')

@section('title')
   User Package
@endsection

@section('content')

<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Users /</span> Edit
</h4>

<div class="card mb-4 col-md-6">
   <form class="card-body" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
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
      <a href="{{ route('users.index') }}" class="btn btn-label-secondary">Back</a>
   </form>

   </div>

</div>

@endsection


@section('script')
<!-- Add this to the head section of your HTML file -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Function to update the total price based on selected services
        function updateTotalPrice() {
            var totalPrice = 0;
            $('#selectpickerMultiple option:selected').each(function () {
                totalPrice += parseFloat($(this).data('price')) || 0;
            });

            // Update the price input
            $('#price').val(totalPrice.toFixed(2));
        }

        // Attach change event listener to the selectpicker
        $(document).on('changed.bs.select', '#selectpickerMultiple', function () {
            updateTotalPrice();
        });

        // Initial update when the page loads
        updateTotalPrice();
    });
</script>


@endsection