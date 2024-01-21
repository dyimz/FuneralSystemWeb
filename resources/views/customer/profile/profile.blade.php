
@extends('layouts.landing.master')

@section('title')
   Profile
@endsection

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


                    <div class="col-xl-8 col-lg-7 col-md-7">
                        <!-- Orders table -->
                        <div class="card mb-4">
                            <h5 class="card-header">My Orders</h5>

                            @if(session('cancel'))
                            <div class="card-body">
                                <div class="alert alert-primary alert-dismissible" role="alert">
                                    {{ session('cancel') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                            </div>
                            @endif
                            
                            <div class="card-datatable table-responsive">
                                <table class="table" id="orders-table">
                                <thead>
                                    <tr>
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
                            <h5 class="card-header">Registered Deceased</h5>

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
                    
                
                    
                    </div>

                </div>

            </div>

            @include('customer.profile.editModal')
        </div>
    </div>


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
        ajax: '/customer/customerOrders/' + user_id,
        columns: [
            {data: 'id', name: 'id'},
            {data: 'type', name: 'type'},
            {
                data: 'status',
                name: 'status',
                render: function (data, type, full, meta) {
                  // Assuming 'status' contains the status text
                  if (data === 'PLACED') {
                    return '<span class="badge bg-label-primary">' + data + '</span>';
                  } else if (data === 'PREPARING'){
                    return '<span class="badge bg-label-warning">' + data + '</span>';
                  } else if (data === 'ON-GOING') {
                    return '<span class="badge bg-label-info">' + data + '</span>';
                  } else {
                    return '<span class="badge bg-label-success">' + data + '</span>';
                  }
                }
            },
            {data: 'total_price', name: 'total_price'},
            {data: 'paymentstatus', name: 'paymentstatus'},
            {
              data: null,
              render: function (data, type, row) {
                  return '<a href="/customer/showOrder/' + row.id + '" class="btn rounded-pill btn-icon btn-label-primary">' +
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
        ajax: '/customer/customerDeads/' + user_id,
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
                  return '<a href="/customer/showDead/' + row.id + '" class="btn rounded-pill btn-icon btn-label-primary">' +
                          '<span class="tf-icons bx bx-info-circle"></span>' +
                          '</a>';
              }
            },
        ],
    });
});
</script>
@endsection