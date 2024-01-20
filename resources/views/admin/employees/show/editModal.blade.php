<!-- Modal -->
<!-- Edit User Modal -->
<div class="modal fade" id="editUser{{$employee->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-edit-user">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3>Edit Employee Information</h3>
          <p>Updating user details will receive a privacy audit.</p>
        </div>
        <form id="editUserForm" class="row g-3" action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            {{ method_field('patch') }}
            {{ csrf_field() }}

            <div class="user-avatar-section">
                <div class=" d-flex align-items-center flex-column">
                    <img class="img-fluid rounded my-4" src="{{asset($employee->image)}}" height="110" width="110" alt="User avatar">
                </div>
            </div>

            <div class="col-12 col-md-12">
                <label class="form-label" for="image">Change Image</label>
                <input type="file" id="image" name="image" class="form-control" />
            </div>
        
            <div class="col-12 col-md-6">
                <label class="form-label" for="fname">First Name</label>
                <input type="text" id="fname" name="fname" class="form-control" value="{{$employee->fname}}"  />
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label" for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" class="form-control" value="{{$employee->lname}}" />
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label" for="birthdate">Birthdate</label>
                <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{$employee->birthdate}}"/>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label" for="sex">Sex</label>
                <select id="sex" name="sex" class="form-select" aria-label="Default select example">
                    @if($employee->sex == 'MALE')
                        <option >-</option>
                        <option selected value="MALE">MALE</option>
                        <option value="FEMALE">FEMALE</option>
                    @else
                        <option >-</option>
                        <option value="MALE">MALE</option>
                        <option selected value="FEMALE">FEMALE</option>
                    @endif
                </select>
            </div>

            <div class="col-12 col-md-12">
                <label class="form-label" for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control" value="{{$employee->address}}" />
            </div>


            <div class="col-12 col-md-6">
                <label class="form-label" for="contact">Phone Number</label>
                <div class="input-group input-group-merge">
                <input type="text" id="contact" name="contact" class="form-control phone-number-mask" value="{{$employee->contact}}"/>
                </div>
            </div>

          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Edit User Modal -->