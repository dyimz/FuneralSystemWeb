@extends('layouts.internal.master')

@section('title')
   Add Product
@endsection

@section('content')

<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Products /</span> Add
</h4>

<div class="card mb-4">
  <form class="card-body" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
      @csrf

    <h6>Product Information</h6>
    <div class="row g-3">
      
      <div class="col-md-6">
        @foreach ($errors->all() as $error)
          <div class="alert alert-warning alert-dismissible" role="alert">
          {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
          </div>
        @endforeach
      </div>
    </div>

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

      <div class="col-md-6">
        <label class="form-label" for="multicol-country">Category</label>
        <select id="Category" class="select2 form-select" name="category" data-allow-clear="true" required>
          <option value="">Select</option>
          <option value="Urns">Urns</option>
          <option value="Burial Vaults">Burial Vaults</option>
          <option value="Burial Mechandise">Burial Mechandise</option>
          <option value="Casket">Casket</option>
        </select>
      </div>

      <div class="col-md-6">
        <label class="form-label" for="multicol-first-name">Stock</label>
        <input type="number" id="stock" name="stock" class="form-control" placeholder="Stock" required/>
        @if ($errors->has('stock'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('stock') }}</span></small>
        @endif
      </div>

      <div class="col-md-6">
        <label class="form-label" for="multicol-first-name">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="description" required></textarea>
        @if ($errors->has('description'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('description') }}</span></small>
        @endif
      </div>

      <div class="col-md-6">
        <label class="form-label" for="multicol-first-name">Image</label>
        <input type="file" id="img_path" name="img_path" class="form-control"/>
      </div>


      <div class="col-md-6">
        <label class="form-label" for="multicol-first-name">Size <medium class="text-light fw-medium"><em>(cm)</em></medium></label>
        <input type="text" id="size" name="size" class="form-control" placeholder="Size" required/>
        @if ($errors->has('size'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('size') }}</span></small>
        @endif
      </div>

      <div class="col-md-6">
        <label class="form-label" for="multicol-first-name">Capacity <medium class="text-light fw-medium"><em>(cubic cm)</em></medium></label>
        <input type="text" id="capacity" name="capacity" class="form-control" placeholder="Capacity" required/>
        @if ($errors->has('capacity'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('capacity') }}</span></small>
        @endif
      </div>

      <div class="col-md-6">
        <label class="form-label" for="multicol-first-name">Weight<medium class="text-light fw-medium"><em>(kg)</em></medium></label>
        <input type="text" id="weight" name="weight" class="form-control" placeholder="Weight" required/>
        @if ($errors->has('weight'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('weight') }}</span></small>
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