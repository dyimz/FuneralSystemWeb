@extends('layouts.internal.master')

@section('title')
   Edit Deceased
@endsection

@section('content')

<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Deceased /</span> Edit
</h4>

<div class="card mb-4">
   <form class="card-body" method="POST" action="{{ route('deceased.update', $dead->id) }}" enctype="multipart/form-data">
      @method('PATCH')
      @csrf

  <h6>Customer:</h6>


  <div class="col-xl-8 col-lg-7 col-md-7 dead-0 dead-md-1">
    <div class="row"> 
      <div class="col-xl-5 col-12">
        <dl class="row mb-0">
          <dd class="col-sm-8"> <a href="{{ route('customers.show', $dead->customer->id) }}">{{$dead->customer->fname}} {{$dead->customer->lname}}</a></dd>
        </dl>
      </div>
    </div>
  </div>

  <hr>

 <h6>Deceased Information</h6>

  @if(session('status'))
      <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div>
    @endif

    <div class="row g-3">
      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">First Name</label>
        <input type="text" id="fname" name="fname" class="form-control" required value="{{old('name', $dead->fname) }}"/>
        @if ($errors->has('fname'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('fname') }}</span></small>
        @endif
      </div>

      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">Middle Name</label>
        <input type="text" id="mname" name="mname" class="form-control" required value="{{old('name', $dead->mname) }}"/>
        @if ($errors->has('mname'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('mname') }}</span></small>
        @endif
      </div>

      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">Last Name</label>
        <input type="text" id="lname" name="lname" class="form-control" required value="{{old('name', $dead->lname) }}"/>
        @if ($errors->has('lname'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('lname') }}</span></small>
        @endif
      </div>

      <div class="col-md-3">
        <label class="form-label" for="multicol-first-name">Relationship</label>
        <input type="text" id="relationship" name="relationship" class="form-control" required value="{{old('name', $dead->relationship) }}"/>
        @if ($errors->has('relationship'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('relationship') }}</span></small>
        @endif
      </div>

      <div class="col-md-3">
        <label class="form-label" for="multicol-first-name">Sex</label>
        {!! Form::select('sex', [
        '' => '-', 
         'Male' => 'Male', 
         'Female' => 'Female', 
         ], $dead->sex, ['class' => 'select form-select', 'id' => 'sex', 'required' => 'required']) !!}
        @if ($errors->has('sex'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('sex') }}</span></small>
        @endif
      </div>

      <div class="col-md-3">
        <label class="form-label" for="multicol-first-name">Age</label>
        <input type="number" id="age" name="age" class="form-control" required value="{{old('name', $dead->age) }}"/>
        @if ($errors->has('age'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('age') }}</span></small>
        @endif
      </div>

      <div class="col-md-3">
        <label class="form-label" for="multicol-first-name">Birthdate</label>
        <input type="date" id="dateofbirth" name="dateofbirth" class="form-control" required value="{{old('name', $dead->dateofbirth) }}"/>
        @if ($errors->has('dateofbirth'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('dateofbirth') }}</span></small>
        @endif
      </div>

      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">Religion</label>
        <input type="text" id="religion" name="religion" class="form-control" required value="{{old('name', $dead->religion) }}"/>
        @if ($errors->has('religion'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('religion') }}</span></small>
        @endif
      </div>

      <div class="col-md-8">
        <label class="form-label" for="multicol-first-name">Address</label>
        <input type="text" id="address" name="address" class="form-control" required value="{{old('name', $dead->address) }}"/>
        @if ($errors->has('address'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('address') }}</span></small>
        @endif
      </div>

      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">Citizenship</label>
        <input type="text" id="citizenship" name="citizenship" class="form-control" required value="{{old('name', $dead->citizenship) }}"/>
        @if ($errors->has('citizenship'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('citizenship') }}</span></small>
        @endif
      </div>

      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">Civil Status</label>
        {!! Form::select('civilstatus', [
        '' => '-', 
         'Single' => 'Single', 
         'Married' => 'Married', 
         'Divorced' => 'Divorced', 
         'Widowed' => 'Widowed', 
         'Separated' => 'Separated', 
         'Common-law' => 'Common-law', 
         ], $dead->civilstatus, ['class' => 'select form-select', 'id' => 'civilstatus', 'required' => 'required']) !!}
        @if ($errors->has('civilstatus'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('civilstatus') }}</span></small>
        @endif
      </div>

      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">Occupation</label>
        <input type="text" id="occupation" name="occupation" class="form-control" required value="{{old('name', $dead->occupation) }}"/>
        @if ($errors->has('occupation'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('occupation') }}</span></small>
        @endif
      </div>

      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">ID Type</label>
          {!! Form::select('idtype', [
              '' => '-', 
              'PWD' => 'PWD', 
              'SENIOR' => 'Senior Citizen ID', 
            ], $dead->idtype,['class' => 'select form-select']) !!}
          @if ($errors->has('nameMother'))
            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('nameMother') }}</span></small>
          @endif
      </div>

      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">Valid ID</label>
        <input type="file" id="validid" name="validid" class="form-control"/>
        @if($dead->validid)
          <a href="/{{$dead->validid}}" download="Valid-ID-#{{$dead->id}}"><i class="menu-icon tf-icons bx bx-download"></i>Download File</a>
        @endif
        @if ($errors->has('validid'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('validid') }}</span></small>
        @endif
      </div>

      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">Upload Image (For Obituary)</label>
        <input type="file" id="image" name="image" class="form-control" value="{{old('name', $dead->image) }}"/>
        @if ($errors->has('image'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('image') }}</span></small>
        @endif
      </div>

      <div class="col-md-3">
        <label class="form-label" for="multicol-first-name">Father's Name</label>
        <input type="text" id="nameFather" name="nameFather" class="form-control" required value="{{old('name', $dead->nameFather) }}"/>
        @if ($errors->has('nameFather'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('nameFather') }}</span></small>
        @endif
      </div>

      <div class="col-md-3">
        <label class="form-label" for="multicol-first-name">Mother's Name</label>
        <input type="text" id="nameMother" name="nameMother" class="form-control" required value="{{old('name', $dead->nameMother) }}"/>
        @if ($errors->has('nameMother'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('nameMother') }}</span></small>
        @endif
      </div>

    </div>

      <hr>

    <h6>Death Information:</h6>
    <div class="row g-3">
      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">Date of Death</label>
        <input type="date" id="dateofdeath" name="dateofdeath" class="form-control" required value="{{old('name', $dead->dateofdeath) }}"/>
        @if ($errors->has('dateofdeath'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('dateofdeath') }}</span></small>
        @endif
      </div>

      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">Cause of Death</label>
        <input type="text" id="causeofdeath" name="causeofdeath" class="form-control" required value="{{old('name', $dead->causeofdeath) }}"/>
        @if ($errors->has('causeofdeath'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('causeofdeath') }}</span></small>
        @endif
      </div>

      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">Place of Death</label>
        <input type="text" id="placeofdeath" name="placeofdeath" class="form-control" required value="{{old('name', $dead->placeofdeath) }}"/>
        @if ($errors->has('placeofdeath'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('placeofdeath') }}</span></small>
        @endif
      </div>

      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">Transfer Permit</label>
        <input type="file" id="transferpermit" name="transferpermit" class="form-control" value="{{old('name', $dead->transferpermit) }}"/>
        <a href="/{{$dead->transferpermit}}" download="TP-#{{$dead->id}}"><i class="menu-icon tf-icons bx bx-download"></i>Download File</a>
        @if ($errors->has('transferpermit'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('transferpermit') }}</span></small>
        @endif
      </div>

      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">Swab Test</label>
        <input type="file" id="swabtest" name="swabtest" class="form-control" value="{{old('name', $dead->swabtest) }}"/>
        <a href="/{{$dead->swabtest}}" download="ST-#{{$dead->id}}"><i class="menu-icon tf-icons bx bx-download"></i> DownloadFile</a>
        @if ($errors->has('swabtest'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('swabtest') }}</span></small>
        @endif
      </div>

      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">Proof of Death</label>
        <input type="file" id="proofofdeath" name="proofofdeath" class="form-control" value="{{old('name', $dead->proofofdeath) }}"/>
        <a href="/{{$dead->proofofdeath}}" download="POD-#{{$dead->id}}"><i class="menu-icon tf-icons bx bx-download"></i>Download File</a>
        @if ($errors->has('proofofdeath'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('proofofdeath') }}</span></small>
        @endif
      </div>

      <div class="col-md-4">
        <label class="form-label" for="multicol-first-name">Cemetery Name</label>
        <input type="text" id="namecemetery" name="namecemetery" class="form-control" required value="{{old('name', $dead->namecemetery) }}"/>
        @if ($errors->has('namecemetery'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('namecemetery') }}</span></small>
        @endif
      </div>

      <div class="col-md-8">
        <label class="form-label" for="multicol-first-name">Cemetery Address</label>
        <input type="text" id="addresscemetery" name="addresscemetery" class="form-control" required value="{{old('name', $dead->addresscemetery) }}"/>
        @if ($errors->has('addresscemetery'))
          <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('addresscemetery') }}</span></small>
        @endif
      </div>
    </div>
  
    <div class="pt-4">
      <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
   </form>
      <button type="button" class="btn btn-label-secondary" onclick="window.history.back()">Back</button>
   </div>

</div>

@endsection


@section('script')
<!-- Add this to the head section of your HTML file -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



@endsection