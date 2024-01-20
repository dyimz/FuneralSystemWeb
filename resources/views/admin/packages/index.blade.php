@extends('layouts.internal.master')


@section('title')
  Packages
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Packages /</span> Table
</h4>
<!-- DataTable with Buttons -->
<div class="card">
  <div class="card-datatable table-responsive">
    <table class="table" id="products-table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Category</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Category</th>
          <th>Price</th>
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
        ajax: '{!! route('packages.index') !!}',
        columns: [
            { data: 'img', name: 'img',
                "render": function (data, type, full, meta) {
                    return "<img src=\""+ admin + "/" + data + "\" height=\"100\" width=\"100\"/>";

            },orderable: false},
            {data: 'name', name: 'name'},
            {data: 'category', name: 'category'},
            {data: 'price', name: 'price'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
});

</script>
  
@endsection