@extends('layouts.internal.master')


@section('title')
   Dashboard
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Orders /</span> Table
</h4>
<!-- DataTable with Buttons -->
<div class="card">
  <div class="card-datatable table-responsive">
    <table class="table" id="orders-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Total Price</th>
          <th>MOP</th>
          <th>Status</th>
          <th>Type</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Total Price</th>
          <th>MOP</th>
          <th>Status</th>
          <th>Type</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>


  <script src="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/jquery/jquery.js"></script>


<script>
$(document).ready(function () {
  var admin = {!! json_encode(url('/')) !!}
    $('#orders-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('admin.cancelledOrders') !!}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'total_price', name: 'total_price'},
            {data: 'MOP', name: 'MOP'},

            {
                data: 'status',
                name: 'status',
                render: function (data, type, full, meta) {
                    return '<span class="badge bg-label-danger">' + data + '</span>';
                }
            },
            {data: 'type', name: 'type'},
            // {
            //     data: 'deceased_id',
            //     name: 'deceased_id',
            //     render: function (data, type, full, meta) {
            //       // Assuming 'status' contains the status text
            //       if (data === null) {
            //         return '-';
            //       } else {
            //         return data ;
            //       }
            //     }
            // },

        ],
    });
});

</script>
  
@endsection