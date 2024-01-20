<div style="display:flex;">

<!-- <form action="{{ route('admin.orders.backward',$id) }}" method="GET" style="padding:2px">
        @csrf
        @method('GET')
        <button class="btn rounded-pill btn-icon btn-label-warning">
                <span class="tf-icons bx bx-chevron-left"></span>
        </button>
</form>


<form action="{{ route('admin.orders.forward',$id) }}" method="GET" style="padding:2px">
        @csrf
        @method('GET')
        <button class="btn rounded-pill btn-icon btn-label-warning">
                <span class="tf-icons bx bx-chevron-right"></span>
        </button>
</form> -->

<a href="{{ route('admin.orders.backward',$id) }}" class="btn rounded-pill btn-icon btn-label-dark">
    <span class="tf-icons bx bx-chevron-left"></span>
</a>

<a href="{{ route('admin.orders.forward',$id) }}" class="btn rounded-pill btn-icon btn-label-dark">
    <span class="tf-icons bx bx-chevron-right"></span>
</a>
<!-- <form id="removeForm" action="{{ route('products.destroy',$id) }}" method="POST" style="padding:2px">
        @csrf
        @method('DELETE')
        <button type="button" class="btn rounded-pill btn-icon btn-label-danger">
                <span class="tf-icons bx bx-trash"></span>
        </button>
</form> -->

</div>