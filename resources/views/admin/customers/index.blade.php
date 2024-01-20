@extends('layouts.internal.master')


@section('title')
  Packages
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Customers /</span> Table
</h4>
<!-- DataTable with Buttons -->
<div class="card">
  <div class="card-datatable table-responsive">
    <table class="table" id="products-table">
      <thead>
        <tr>
          <!-- <th>Image</th> -->
          <th>Name</th>
          <th>Age</th>
          <th>Contact</th>
          <th>Verified</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <!-- <th>Image</th> -->
          <th>Name</th>
          <th>Age</th>
          <th>Contact</th>
          <th>Verified</th>
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
        ajax: '{!! route('customers.index') !!}',
        columns: [
            // { data: 'img', name: 'img',
            //     "render": function (data, type, full, meta) {
            //         return "<img src=\""+ admin + "/" + data + "\" height=\"100\" width=\"100\"/>";

            // },orderable: false},
            {
                data: null,
                name: 'name',
                render: function (data, type, full, meta) {
                    return data.fname + ' ' + data.lname;
                }
            },
            {data: 'age', name: 'age'},
            {data: 'contact', name: 'contact'},
            {
                data: 'verified',
                name: 'verified',
                render: function (data, type, full, meta) {
                    if (data) {
                        return '<span class="badge badge-center rounded-pill bg-label-success"><i class="bx bx-check"></i></span>';
                    } else {
                        return '<span class="badge badge-center rounded-pill bg-label-danger"><i class="bx bx-x"></i></span>';
                    }
                }
            },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
});

</script>
  
@endsection