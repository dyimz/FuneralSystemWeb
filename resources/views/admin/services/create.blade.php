@extends('layouts.internal.master')

@section('title')
   Add Service
@endsection

@section('content')

<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Services /</span> Add
</h4>

<div class="card mb-4">
  <form class="card-body" method="POST" action="{{route('services.store')}}" enctype="multipart/form-data">
      @csrf

    <h6>Service Information</h6>

    <div class="row g-3">

      <div class="col-md-6">
        <label class="form-label" for="multicol-first-name">Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required/>
        @if ($errors->has('name'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('name') }}</span></small>
        @endif
      </div>

      <div class="col-md-6">
        <label class="form-label" for="multicol-first-name">Price <medium class="text-light fw-medium"><em>(Ex. 4.22)</em></medium></label>
        <input type="text" id="price" name="price" class="form-control" placeholder="Price" pattern="\d+(\.\d{1,2})?" required/>
        @if ($errors->has('price'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('price') }}</span></small>
        @endif
      </div>

    </div>
    <div class="pt-4">
      <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
   </form>
      <button type="button" class="btn btn-label-secondary" onclick="window.history.back()">Back</button>
    </div>

</div>


@endsection