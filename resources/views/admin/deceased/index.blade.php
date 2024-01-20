@extends('layouts.internal.master')


@section('title')
  Deceased
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Deceased /</span> Table
</h4>
<!-- DataTable with Buttons -->
<div class="card">
  <div class="card-datatable table-responsive">
    <table class="table" id="products-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Cause of Death</th>
          <th>Date Registered</th>
          <th>Customer</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Cause of Death</th>
          <th>Date Registered</th>
          <th>Customer</th>
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
    $('#products-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('deceased.index') !!}',
        columns: [
          {data: 'id', name: 'id'},
          {
              data: null,
              name: 'name',
              render: function (data, type, full, meta) {
                  return data.fname + ' ' + data.lname;
              }
          },
          {data: 'causeofdeath', name: 'causeofdeath'},
          {
            data: 'created_at',
            name: 'created_at',
            render: function(data, type, full, meta) {
                // Format the date using JavaScript Date object
                var date = new Date(data);
                var formattedDate = date.getFullYear() + '-' + 
                                    ('0' + (date.getMonth() + 1)).slice(-2) + '-' + 
                                    ('0' + date.getDate()).slice(-2) + ' ' + 
                                    ('0' + ((date.getHours() % 12) || 12)).slice(-2) + ':' + 
                                    ('0' + date.getMinutes()).slice(-2) + ' ' +
                                    (date.getHours() >= 12 ? 'PM' : 'AM');

                return formattedDate;
            }
          },
          {data: 'customer', name: 'customer'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        columnDefs: [
            { type: 'html', targets: 'customer' }
        ],
    });
});

</script>
  
@endsection