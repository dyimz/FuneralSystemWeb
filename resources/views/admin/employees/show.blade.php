@extends('layouts.internal.master')


@section('title')
  Customer Details
@endsection

@section('content')

@if(session('reload'))
    <script>
        location.reload(true);
    </script>
@endif

<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Employee/ </span>#{{$employee->id}}
</h4>

<div class="row">
  <!-- User Sidebar -->
  @include('admin.employees.show.employeeSidebar')
  <!--/ User Sidebar -->


  <!-- User Content -->
  <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
    @include('admin.employees.show.editModal')
  </div>
  <!--/ User Content -->
</div>

@endsection


@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

</script>

@endsection