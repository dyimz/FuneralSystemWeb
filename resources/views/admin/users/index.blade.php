@extends('layouts.internal.master')


@section('title')
  Users
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Users /</span> Table
</h4>
<!-- DataTable with Buttons -->
<div class="card">
  <div class="card-datatable table-responsive">
    <table class="table" id="products-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Status</th>
          <th>Suspend</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Status</th>
          <th>Suspend</th>
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
        ajax: '{!! route('users.index') !!}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'role', name: 'role'},
            {data: 'status', name: 'status'},
            {data: 'suspend', name: 'suspend'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
});

</script>
  
@endsection