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
          <th>Payed</th>
          <th>Total Price</th>
          <th>MOP</th>
          <th>Status</th>
          <th>Type</th>
          <th>Status Act</th>
          <th>Deceased</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Payed</th>
          <th>Total Price</th>
          <th>MOP</th>
          <th>Status</th>
          <th>Type</th>
          <th>Status Act</th>
          <th>Deceased</th>
          <th>Action</th>
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
        ajax: '{!! route('orders.index') !!}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'paymentstatus', name: 'paymentstatus'},
            {data: 'total_price', name: 'total_price'},
            {data: 'MOP', name: 'MOP'},

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
            {data: 'type', name: 'type'},
            {
                data: 'statusAct',
                name: 'statusAct',
                orderable: false,
                searchable: false,
                render: function (data, type, full, meta) {
                    // Assuming $id is available in your JavaScript code
                    var backwardLink = '{{ route("admin.orders.backward", ":id") }}';
                    var forwardLink = '{{ route("admin.orders.forward", ":id") }}';

                    backwardLink = backwardLink.replace(':id', full.id);
                    forwardLink = forwardLink.replace(':id', full.id);
                    if(full.status === 'PLACED'){
                      return '<a href="' + forwardLink + '" class="btn rounded-pill btn-icon btn-label-dark">' +
                        '<span class="tf-icons bx bx-chevron-right"></span>' +
                        '</a>';
                    } else if(full.status === 'PREPARING'){
                      return '<a href="' + backwardLink + '" class="btn rounded-pill btn-icon btn-label-dark">' +
                        '<span class="tf-icons bx bx-chevron-left"></span>' +
                        '</a>' +
                        '<a href="' + forwardLink + '" class="btn rounded-pill btn-icon btn-label-dark">' +
                        '<span class="tf-icons bx bx-chevron-right"></span>' +
                        '</a>';
                    } else if (full.status === 'ON-GOING'){
                      return '<a href="' + backwardLink + '" class="btn rounded-pill btn-icon btn-label-dark">' +
                        '<span class="tf-icons bx bx-chevron-left"></span>' +
                        '</a>' +
                        '<a href="' + forwardLink + '" class="btn rounded-pill btn-icon btn-label-dark">' +
                        '<span class="tf-icons bx bx-chevron-right"></span>' +
                        '</a>';
                    } else {
                      return '<a href="' + backwardLink + '" class="btn rounded-pill btn-icon btn-label-dark">' +
                        '<span class="tf-icons bx bx-chevron-left"></span>' +
                        '</a>'
                    }


                }
            },
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

            {data: 'dead', name: 'dead', orderable: false, searchable: false},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
});

</script>
  
@endsection