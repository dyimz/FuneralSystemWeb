@extends('layouts.internal.master')


@section('title')
  Customer Details
@endsection

@section('content')

@if(session('reload'))
    <script>
        location.reload(true);
    </script>
@endif

<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Customer /</span> Table
</h4>

<div class="row">
  <!-- User Sidebar -->
  @include('admin.customers.show.customerSidebar')
  <!--/ User Sidebar -->


  <!-- User Content -->
  <div class="col-xl-8 col-lg-7 col-md-7 dead-0 dead-md-1">
    <!-- User Pills -->
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link" href="javascript:void(0);"><i class="bx bx-user me-1"></i>Account</a></li>
    </ul>
    <!--/ User Pills -->
    <div class="card card-action mb-4">
      <div class="card-header align-items-center">
        <h5 class="card-action-title mb-0">Deceased #{{$dead->id}}</h5>
      </div>
      <div class="card-body">

        <div class="row">
          <div class="col-xl-5 col-12">
            <dl class="row mb-0">
              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">First Name:</dt>
              <dd class="col-sm-8">{{$dead->fname}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Middle Name:</dt>
              <dd class="col-sm-8">{{$dead->mname}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Last Name:</dt>
              <dd class="col-sm-8">{{$dead->lname}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Relationship:</dt>
              <dd class="col-sm-8">{{$dead->relationship}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Cause of Death:</dt>
              <dd class="col-sm-8">{{$dead->causeofdeath}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Sex:</dt>
              <dd class="col-sm-8">{{$dead->sex}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Religion:</dt>
              <dd class="col-sm-8">{{$dead->religion}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Age:</dt>
              <dd class="col-sm-8">{{$dead->age}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Date of Birth:</dt>
              <dd class="col-sm-8">{{$dead->dateofbirth}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Date of Death:</dt>
              <dd class="col-sm-8">{{$dead->dateofdeath}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Place of Death:</dt>
              <dd class="col-sm-8">{{$dead->placeofdeath}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Citizenship:</dt>
              <dd class="col-sm-8">{{$dead->citizenship}}</dd>
            </dl>
          </div>
          <div class="col-xl-7 col-12">
            <dl class="row mb-0">
              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Address:</dt>
              <dd class="col-sm-8">{{$dead->address}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Civil Status:</dt>
              <dd class="col-sm-8">{{$dead->civilstatus}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Occupation:</dt>
              <dd class="col-sm-8">{{$dead->Occupation}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Cemetery:</dt>
              <dd class="col-sm-8">{{$dead->namecemetery}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Cemetery Address:</dt>
              <dd class="col-sm-8">{{$dead->addresscemetery}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Name of Father:</dt>
              <dd class="col-sm-8">{{$dead->nameFather}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Name of Mother:</dt>
              <dd class="col-sm-8">{{$dead->nameMother}}</dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Transfter Permit:</dt>
              <dd class="col-sm-8">
                <a href="/{{$dead->transferpermit}}" download="transfer-permit-({{$dead->fname}} {{$dead->lname}})">
                  <i class="menu-icon tf-icons bx bx-download"></i>Download
                </a>
              </dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Swab Test:</dt>
              <dd class="col-sm-8">
                <a href="/{{$dead->swabtest}}" download="swab-test-({{$dead->fname}} {{$dead->lname}})">
                  <i class="menu-icon tf-icons bx bx-download"></i>Download
                </a>
              </dd>

              <dt class="col-sm-4 fw-medium mb-3 text-nowrap">Proof of Death:</dt>
              <dd class="col-sm-8">
                <a href="/{{$dead->proofofdeath}}" download="proof-of-death-({{$dead->fname}} {{$dead->lname}})">
                  <i class="menu-icon tf-icons bx bx-download"></i>Download
                </a>
              </dd>

            </dl>
          </div>
        </div>



          <div class="mt-4">
            <a href="{{ route('deceased.edit',$dead->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">Back</a>
          </div>

      </div>
    </div>



    @include('admin.customers.show.editModal')
  </div>
  <!--/ User Content -->
</div>

@endsection