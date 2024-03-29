                <!-- Header -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="card mb-4">
                        <div class="user-profile-header-banner">
                            <img src="../../assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top">
                        </div>
                        <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            <img src="{{asset($customer->custimage)}}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                            </div>
                            <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                <h4>{{$customer->fname}} {{$customer->lname}}</h4>
                                <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item fw-medium">
                                    <i class='bx bx-calendar-alt'></i> Joined {{ \Carbon\Carbon::parse($customer->created_at)->format('F j, Y h:iA') }}
                                    </li>
                                </ul>
                                </div>

                                <a href="javascript:void(0)" class="btn btn-primary text-nowrap" data-bs-target="#editMe{{$customer->id}}" data-bs-toggle="modal">
                                    <i class='bx bx-edit me-1'></i>Edit
                                </a>

        
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!--/ Header -->
                @include('customer.profile.editModal')