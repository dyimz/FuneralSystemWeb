                   <!-- About User -->
                   <div class="col-xl-4 col-lg-5 col-md-5">
                        <div class="card mb-4">
                            <div class="card-body">
                                <small class="text-muted text-uppercase">About</small>
                                <ul class="list-unstyled mb-4 mt-3">
                                <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-medium mx-2">Full Name:</span> <span>{{$customer->fname}} {{$customer->lname}}</span></li>
                                <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-medium mx-2">Status:</span>
                                    @if($customer->verified)
                                    <span class="text-success">Verified</span>
                                    @else
                                    <span class="text-warning">Unverified</span>
                                    @endif
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-medium mx-2">Role:</span> <span>{{$customer->user->role}}</span></li>
                                <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span class="fw-medium mx-2">Country:</span> <span>Philippines</span></li>
                                </ul>
                                <small class="text-muted text-uppercase">Contacts</small>
                                <ul class="list-unstyled mb-4 mt-3">
                                <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span class="fw-medium mx-2">Contact:</span> <span>{{$customer->contact}}</span></li>
                                <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span class="fw-medium mx-2">Email:</span> <span>{{$customer->user->email}}</span></li>
                                </ul>
                            </div>
                        </div>
  

                        <!-- Profile Overview -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <small class="text-muted text-uppercase">Edit user</small>
                                <ul class="list-unstyled mt-3 mb-0">
                                <li class="d-flex align-items-center mb-3">
                                    <i class="bx bx-user"></i>
                                    <span class="fw-medium mx-2">Username</span> 
                                    <span>{{$customer->user->username}}</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <i class='bx bx-envelope'></i>
                                    <span class="fw-medium mx-2">Email</span> 
                                    <span>{{$customer->user->email}}</span>
                                </li>
                                
                                </ul>
                                <div class="mt-4">
                                    <a href="{{route('customer.changePass')}}" class="btn btn-primary me-2">Change Password</a>
                                </div>
                            </div>
                        </div>
                        <!--/ Profile Overview -->
                    </div>
                    <!--/ About User -->