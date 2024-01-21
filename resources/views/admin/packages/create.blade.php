@extends('layouts.internal.master')


@section('title')
  Packages
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Packages /</span> Add
</h4>

<!-- Multi Column with Form Separator -->
<div class="card mb-4">
  <form class="card-body" method="POST" action="{{route('packages.store')}}" enctype="multipart/form-data">
  @csrf
    <h6>Package Info</h6>
    <div class="row g-3">

      <div class="col-md-6">
        <label class="form-label" for="multicol-first-name">Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{old('name') }}"/>
        @if ($errors->has('name'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('name') }}</span></small>
        @endif
      </div>

      <div class="col-md-6 select2-primary">
        <label for="selectpickerMultiple" class="form-label">Inclusions</label>
        <select id="selectpickerMultiple" class="selectpicker w-100" data-style="btn-default" multiple data-icon-base="bx" data-tick-icon="bx-check text-primary" name="inclusions[]">
            @foreach($services as $service)
              <option value="{{ $service->id }}" data-price="{{ $service->price }}">{{ $service->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('inclusions'))
            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('inclusions') }}</span></small>
        @endif
      </div>




      <div class="col-md-6">
        <label class="form-label" for="multicol-first-name">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="description" required >{{old('description') }}</textarea>
        @if ($errors->has('description'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('description') }}</span></small>
        @endif
      </div>

      <div class="col-md-6">
        <label class="form-label" for="multicol-country">Category</label>
        <select id="Category" class="select form-select" name="category" data-allow-clear="true">
          <option value="">-</option>
          <option value="EMBALMING">EMBALMING</option>
          <option value="CREMATION">CREMATION</option>
          <option value="ALL IN">ALL IN</option>
        </select>
        @if ($errors->has('category'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('category') }}</span></small>
        @endif
      </div>

      <div class="col-md-6">
        <label class="form-label" for="multicol-first-name">Price</label>
        <input type="number" id="price" name="price" class="form-control" placeholder="Price" />
        @if ($errors->has('price'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('price') }}</span></small>
        @endif
      </div>

      <div class="col-md-6">
        <label class="form-label" for="multicol-first-name">Image</label>
        <input type="file" id="img_path" name="img_path" class="form-control"/>
        @if ($errors->has('img_path'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('img_path') }}</span></small>
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