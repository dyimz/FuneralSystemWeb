@extends('layouts.internal.master')


@section('title')
  Deceased
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Employees /</span> Table
</h4>
<!-- DataTable with Buttons -->
<div class="card">
  <div class="card-datatable table-responsive">
    <table class="table" id="products-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Age</th>
          <th>Sex</th>
          <th>Contact</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Age</th>
          <th>Sex</th>
          <th>Contact</th>
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
        ajax: '{!! route('employees.index') !!}',
        columns: [
          {data: 'id', name: 'id'},
          {
              data: null,
              name: 'name',
              render: function (data, type, full, meta) {
                  return data.fname + ' ' + data.lname;
              }
          },
          {data: 'age', name: 'age'},
          {data: 'sex', name: 'sex'},
          {data: 'contact', name: 'contact'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        columnDefs: [
            { type: 'html', targets: 'customer' }
        ],
    });
});

</script>
  
@endsection