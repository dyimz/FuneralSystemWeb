<div style="display:flex;">

<a href="{{ route('customers.show', $id) }}" class="btn rounded-pill btn-icon btn-label-secondary">
    <span class="tf-icons bx bx-info-circle"></span>
</a>


<!-- <form id="removeForm" action="{{ route('products.destroy',$id) }}" method="POST" style="padding:2px">
        @csrf
        @method('DELETE')
        <button type="button" class="btn rounded-pill btn-icon btn-label-danger">
                <span class="tf-icons bx bx-trash"></span>
        </button>
</form> -->

</div>