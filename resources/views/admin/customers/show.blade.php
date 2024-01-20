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
  <span class="text-muted fw-light">Customer/ </span>#{{$customer->id}}
</h4>

<div class="row">
  <!-- User Sidebar -->
  @include('admin.customers.show.customerSidebar')
  <!--/ User Sidebar -->


  <!-- User Content -->
  <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
    <!-- User Pills -->
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link" href="javascript:void(0);"><i class="bx bx-user me-1"></i>Account</a></li>
    </ul>
    <!--/ User Pills -->

    <!-- Orders table -->
    <div class="card mb-4">
      <h5 class="card-header">Customers Orders</h5>
      <div class="card-datatable table-responsive">
        <table class="table" id="orders-table">
          <thead>
            <tr>
              <!-- <th>Image</th> -->
              <th>Order #</th>
              <th>Type</th>
              <th>Status</th>
              <th>Price</th>
              <th>Payed</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <!-- <th>Image</th> -->
              <th>Order #</th>
              <th>Type</th>
              <th>Status</th>
              <th>Price</th>
              <th>Payed</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
          
    </div>
    <!-- /Orders table -->

    <div class="card mb-4">
      <h5 class="card-header">Deceased</h5>

      <div class="card-datatable table-responsive">
        <table class="table" id="dead-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Relationship</th>
              <th>Cause of Death</th>
              <th>Age</th>
              <th>Sex</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Relationship</th>
              <th>Cause of Death</th>
              <th>Age</th>
              <th>Sex</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
          
    </div>

    @include('admin.customers.show.editModal')
  </div>
  <!--/ User Content -->
</div>

@endsection


@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  var user_id = {{$customer->user->id}}
$(document).ready(function () {
    $('#orders-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/customer/customerOrders/' + user_id,
        columns: [
            {data: 'id', name: 'id'},
            {data: 'type', name: 'type'},
            {data: 'status', name: 'status'},
            {data: 'total_price', name: 'total_price'},
            {data: 'paymentstatus', name: 'paymentstatus'},
            {
              data: null,
              render: function (data, type, row) {
                  return '<a href="/admin/customer/showOrder/' + row.id + '" class="btn rounded-pill btn-icon btn-label-primary">' +
                          '<span class="tf-icons bx bx-info-circle"></span>' +
                          '</a>';
              }
            },
        ],
    });
});
</script>

<script>
  var user_id = {{$customer->user->id}}
$(document).ready(function () {
  $('#dead-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/customer/customerDeads/' + user_id,
        columns: [
            {data: 'id', name: 'id'},
            {
                data: null,
                name: 'name',
                render: function (data, type, full, meta) {
                    return data.fname + ' ' + data.lname;
                }
            },

            {data: 'relationship', name: 'relationship'},
            {data: 'causeofdeath', name: 'causeofdeath'},
            {data: 'age', name: 'age'},
            {data: 'sex', name: 'sex'},
            {
              data: null,
              render: function (data, type, row) {
                  return '<a href="/admin/customer/showDead/' + row.id + '" class="btn rounded-pill btn-icon btn-label-primary">' +
                          '<span class="tf-icons bx bx-info-circle"></span>' +
                          '</a>';
              }
            },
        ],
    });
});
</script>

@endsection