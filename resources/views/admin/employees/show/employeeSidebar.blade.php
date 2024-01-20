
<div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
    <!-- User Card -->
    <div class="card mb-4">
      <div class="card-body">
        <div class="user-avatar-section">
          <div class=" d-flex align-items-center flex-column">
            <img class="img-fluid rounded my-4" src="{{asset($employee->image)}}" height="110" width="110" alt="User avatar">
            <div class="user-info text-center">
              <h4 class="mb-2">{{$employee->fname}} {{$employee->lname}}</h4>
              <span class="badge bg-label-secondary">{{$employee->user->role}}</span>
            </div>  
          </div>
        </div>

        <h5 class="pb-2 border-bottom mb-4">Details</h5>
        <div class="info-container">
          <ul class="list-unstyled">
            <li class="mb-3">
              <div class="row">
                <span class="fw-medium me-2">Employee Name:</span>
                <span>{{$employee->fname}} {{$employee->lname}}</span>
              </div>

            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Email:</span>
              <span>{{$employee->user->email}}</span>
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Role:</span>
              <span>{{$employee->user->role}}</span>
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Age:</span>
              <span>{{$employee->age}}</span>
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Contact:</span>
              <span>{{$employee->contact}}</span>
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Sex:</span>
              <span>{{$employee->sex}}</span>
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Address:</span>
              <span>{{$employee->address}}</span>
            </li>
            
          </ul>
          <div class="d-flex justify-content-center pt-3">
            <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser{{$employee->id}}" data-bs-toggle="modal">Edit</a>
            @if($employee->user->status === 'ACTIVE')
              <a href="{{route('admin.user.suspend', $employee->user->id)}}" class="btn btn-label-danger suspend-user">Suspend</a>
            @else
              <a href="{{route('admin.user.suspend', $employee->user->id)}}" class="btn btn-label-success suspend-user">Unsuspend</a>
            @endif
          </div>
        </div>
      </div>
    </div>
    <!-- /User Card -->
    <!-- Plan Card -->
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start">
          <span class="badge bg-label-primary">Standard</span>
          <div class="d-flex justify-content-center">
            <sup class="h5 pricing-currency mt-3 mb-0 me-1 text-primary">$</sup>
            <h1 class="display-5 mb-0 text-primary">99</h1>
            <sub class="fs-6 pricing-duration mt-auto mb-3">/month</sub>
          </div>
        </div>
        <ul class="ps-3 g-2 my-4">
          <li class="mb-2">10 Users</li>
          <li class="mb-2">Up to 10 GB storage</li>
          <li>Basic Support</li>
        </ul>
        <div class="d-flex justify-content-between align-items-center mb-1">
          <span>Days</span>
          <span>65% Completed</span>
        </div>
        <div class="progress mb-1" style="height: 8px;">
          <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <span>4 days remaining</span>
        <div class="d-grid w-100 mt-4 pt-2">
          <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">Upgrade Plan</button>
        </div>
      </div>
    </div>
    <!-- /Plan Card -->
  </div>