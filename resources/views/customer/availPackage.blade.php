@extends('layouts.landing.master')

@section('title')
   Package Checkout
@endsection



@section('content')

<div class="content-wrapper">

  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    
    <div class="pt-3 mt-4"></div>
    <form action="{{route('customer.orderPackage')}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="card g-3 mt-5">
        <div class="card-body row g-3">
          <div class="col-lg-8">
            <!-- <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
              <div class="me-1">
                <h5 class="mb-1">UI/UX Basic Fundamentals</h5>
                <p class="mb-1">Prof. <span class="fw-medium"> Devonne Wallbridge </span></p>
              </div>
              <div class="d-flex align-items-center">
                <span class="badge bg-label-danger">UI/UX</span>
                <i class="bx bx-share-alt bx-sm mx-4"></i>
                <i class="bx bx-bookmarks bx-sm"></i>
              </div>
            </div> -->

    
              <div class="card academy-content shadow-none border">
                <div class="card-body">
                  <input type="text" name="packageid" value="{{$package->id}}" hidden>
                  <h5 class="mb-2">PIKES Fill up form</h5>
                  <p class="mb-0 pt-1">Use this form to provide us with as much or as little detail as you wish and tell us how you'd like us to work with you on the remaining information using the options at the base of the form.</p>
                  <hr class="my-4">
                  <h5>Deceased Information</h5>

                      <div class="row g-3 mb-3">
                        <div class="col-md-4">
                          <label class="form-label" for="multicol-username">First name:</label>
                          <input type="text" id="multicol-username" class="form-control" name="fname" required/>
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="multicol-username">Middle name:</label>
                          <input type="text" id="multicol-username" class="form-control" name="mname" required/>
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="multicol-username">Last name:</label>
                          <input type="text" id="multicol-username" class="form-control" name="lname" required/>
                        </div>
                      </div>

                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Sex:</label>
                          <select id="" class="select form-select" name="sex" required>
                            <option value="">-</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Date of Birth:</label>
                          <input type="date" id="multicol-username" class="form-control" name="dateofbirth" required/>
                        </div>
                      </div>

                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Occupation:</label>
                          <input type="text" id="multicol-username" class="form-control" name="occupation" required/>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Upload Image (for Obituary):</label>
                          <input type="file" id="multicol-username" class="form-control" name="image" required/>
                        </div>
                      </div>

                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Relationship:</label>
                          <input type="text" id="multicol-username" class="form-control" name="relationship" required/>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Religion:</label>
                          <input type="text" id="multicol-username" class="form-control" name="religion"  required/>
                        </div>
                      </div>

                      <div class="row g-3 mb-3">
                        <div class="col-md-12">
                          <label class="form-label" for="multicol-username">Address:</label>
                          <input type="text" id="multicol-username" class="form-control" name="address" required/>
                        </div>
                      </div>
                      
                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Citizenship:</label>
                          <input type="text" id="multicol-username" class="form-control" name="citizenship"  required/>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Civil Status:</label>
                          <select id="" class="select form-select" name="civilstatus" required>
                            <option value="">-</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                            <option value="Common-law">Common-law</option>
                          </select>
                        </div>
                      </div>

                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Mother's Name:</label>
                          <input type="text" id="multicol-username" class="form-control" name="nameMother" required/>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Father's Name:</label>
                          <input type="text" id="multicol-username" class="form-control" name="nameFather"  required/>
                        </div>
                      </div>

                      <h5>Leave blank if not applicable</h5>

                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">ID Type:</label>
                          <select id="" class="select form-select" name="idtype">
                            <option value="">-</option>
                            <option value="PWD">PWD ID</option>
                            <option value="SENIOR">Senior Citizen ID</option>
                          </select>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Upload (PWD or Senior Citizens ID):</label>
                          <input type="file" id="multicol-username" class="form-control" name="validid"/>
                        </div>
                      </div>
                      
                    <hr class="my-4">
                    <h5>Death Information</h5>

                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Transfer Permit:</label>
                          <input type="file" id="multicol-username" class="form-control" name="transferpermit" required/>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Swab Test:</label>
                          <input type="file" id="multicol-username" class="form-control" name="swabtest" required/>
                        </div>
                      </div>

                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Proof of Death:</label>
                          <input type="file" id="multicol-username" class="form-control" name="proofofdeath" required/>
                        </div>
                      </div>

                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Date of Death:</label>
                          <input type="date" id="multicol-username" class="form-control" name="dateofdeath" required/>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Cause of Death:</label>
                          <input type="text" id="multicol-username" class="form-control" name="causeofdeath" required/>
                        </div>
                      </div>
                      
                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Place of Death:</label>
                          <input type="text" id="multicol-username" class="form-control" name="placeofdeath"  required/>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-username">Name of Cemetery:</label>
                          <input type="text" id="multicol-username" class="form-control" name="namecemetery"  required/>
                        </div>
                      </div>

                      <div class="row g-3 mb-3">
                        <div class="col-md-12">
                          <label class="form-label" for="multicol-username">Address of Cemetery:</label>
                          <input type="text" id="multicol-username" class="form-control" name="addresscemetery"  required/>
                        </div>
                      </div>

                    <hr class="my-4">
                    <h5>Required Information</h5>


                      <div class="row g-3 mb-3">
                        <div class="col-md-12">
                          <label class="form-label" for="multicol-first-name">Message:</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                          @if ($errors->has('description'))
                            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('description') }}</span></small>
                          @endif
                        </div>
                      </div>
                      
                      <div class="row g-3 mb-3">
                        <label class="form-label" for="multicol-first-name">Size of casket:</label>

                        <div class="col mt-0">
                          <div class="form-check custom-option custom-option-icon">
                            <label class="form-check-label custom-option-content" for="casketOption1">
                              <span class="custom-option-body">
                                <span class="custom-option-title"> Infant </span>
                              </span>
                              <input name="casketOption" class="form-check-input" type="radio" value="INFANT" id="casketOption1" required 
                              data-bs-toggle="collapse" data-bs-target="#collapseContent1" aria-expanded="false" aria-controls="collapseContent1" onChange="handleCasketOptionChange()"/>
                            </label>
                          </div>
                        </div>

                        <div class="col mt-0">
                          <div class="form-check custom-option custom-option-icon">
                            <label class="form-check-label custom-option-content" for="casketOption2">
                              <span class="custom-option-body">
                                <span class="custom-option-title"> Child </span>
                              </span>
                              <input name="casketOption" class="form-check-input" type="radio" value="CHILD" id="casketOption2" required
                              data-bs-toggle="collapse" data-bs-target="#collapseContent2" aria-expanded="false" aria-controls="collapseContent2" onChange="handleCasketOptionChange()"/>
                            </label>
                          </div>
                        </div>

                        <div class="col mt-0">
                          <div class="form-check custom-option custom-option-icon">
                            <label class="form-check-label custom-option-content" for="casketOption3">
                              <span class="custom-option-body">
                                <span class="custom-option-title"> Standard </span>
                              </span>
                              <input name="casketOption" class="form-check-input" type="radio" value="STANDARD" id="casketOption3" required
                              data-bs-toggle="collapse" data-bs-target="#collapseContent3" aria-expanded="false" aria-controls="collapseContent3" onChange="handleCasketOptionChange()"/>
                            </label>
                          </div>
                        </div>

                        <div class="col mt-0">
                          <div class="form-check custom-option custom-option-icon">
                            <label class="form-check-label custom-option-content" for="casketOption4">
                              <span class="custom-option-body">
                                <span class="custom-option-title"> Oversized </span>
                              </span>
                              <input name="casketOption" class="form-check-input" type="radio" value="OVERSIZED" id="casketOption4" required
                              data-bs-toggle="collapse" data-bs-target="#collapseContent4" aria-expanded="false" aria-controls="collapseContent4" onChange="handleCasketOptionChange()"/>
                            </label>
                          </div>
                        </div>

                      </div>

                      <div class="row g-3 mb-3">

                        <div class="collapse" id="collapseContent1">
                          <label class="form-label" for="multicol-username">Casket Dimensions:</label>
                            <ul>
                              <li>Length: 12" to 24"</li>
                              <li>Width: 8" to 16"</li>
                              <li>Height: 6" to 10"</li>
                            </ul>
                        </div>

                        <div class="collapse" id="collapseContent2">
                          <label class="form-label" for="multicol-username">Casket Dimensions:</label>
                            <ul>
                              <li>Length: 36" to 48"</li>
                              <li>Width: 16" to 24"</li>
                              <li>Height: 10" to 16"</li>
                            </ul>
                        </div>

                        <div class="collapse" id="collapseContent3">
                          <label class="form-label" for="multicol-username">Casket Dimensions:</label>
                            <ul>
                              <li>Length: 72" to 84"</li>
                              <li>Width: 24" to 28"</li>
                              <li>Height: 23" to 27"</li>
                            </ul>
                        </div>

                        <div class="collapse" id="collapseContent4">
                          <label class="form-label" for="multicol-username">Casket Dimensions:</label>
                          <ul>
                            <li>Length: 84" to 96"</li>
                            <li>Width: 28" to 34"</li>
                            <li>Height: 27" to 32"</li>
                          </ul>
                        </div>
                      </div>

                      <div class="row g-3 mb-3">
                        <label class="form-label" for="multicol-first-name">Do you want to inject formalin to decased?</label>
                        <div class="col-md-12 mt-0">
                          <div class="form-check form-check-inline mt-0">
                            <input class="form-check-input" type="radio" name="formalin" id="formalin1" value="YES" required/>
                            <label class="form-check-label" for="formalin1">Yes</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="formalin" id="formalin2" value="NO" required/>
                            <label class="form-check-label" for="formalin2">No</label>
                          </div>
                        </div>
                      </div>

                      <div class="row g-3 mb-3">
                        <label class="form-label" for="multicol-first-name">Do you want to include memorial products?</label>
                        <div class="col-md-12 mt-0">
                          <div class="form-check form-check-inline mt-0">
                            <input class="form-check-input" type="radio" name="products" id="products1" value="YES" required/>
                            <label class="form-check-label" for="products1">Yes</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="products" id="products2" value="NO" required/>
                            <label class="form-check-label" for="products2">No</label>
                          </div>
                        </div>
                      </div>

                      <div class="row g-3 mb-3">
                        <label class="form-label" for="multicol-first-name">Do you want deceased to have make-up?</label>
                        <div class="col-md-12 mt-0">
                          <div class="form-check form-check-inline mt-0">
                            <input class="form-check-input" type="radio" name="makeup" id="makeup1" value="YES" required/>
                            <label class="form-check-label" for="makeup1">Yes</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="makeup" id="makeup2" value="NO" required/>
                            <label class="form-check-label" for="makeup2">No</label>
                          </div>
                        </div>
                      </div>

                      <div class="row g-3 mb-3">
                        <label class="form-label" for="multicol-first-name">Do you want to cremate the decased?</label>
                        <div class="col-md-12 mt-0">
                          <div class="form-check form-check-inline mt-0">
                            <input class="form-check-input" type="radio" name="cremate" id="cremate1" value="YES" required/>
                            <label class="form-check-label" for="cremate1">Yes</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cremate" id="cremate2" value="NO" required/>
                            <label class="form-check-label" for="cremate2">No</label>
                          </div>
                        </div>
                      </div>

                      <div class="row g-3 mb-3">
                        <div class="col-md-12">
                          <label class="form-label" for="multicol-first-name">Note:</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                          @if ($errors->has('note'))
                            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('note') }}</span></small>
                          @endif
                        </div>
                      </div>

                      <div class="row g-3 mb-3">
                      <label class="form-label" for="multicol-username">Location of deceased:</label>
                        <div class="col-md-6 mt-0">
                          <label class="form-check-label">From:</label>
                          <input type="text" id="multicol-username" name="locationfrom" class="form-control" required/>
                        </div>
                        <div class="col-md-6 mt-0">
                          <label class="form-check-label">To:</label>
                          <input type="text" id="multicol-username" name="locationto" class="form-control" required/>
                        </div>
                      </div>
                      
                      <div class="row g-3 mb-3">
                        <label class="form-label" for="multicol-username">Duration of wake:</label>      
                        <div class="col-md-6 mt-0">
                          <label class="form-check-label">From:</label>
                          <input type="datetime-local" id="multicol-username" name="durationfrom" class="form-control" required/>
                        </div>
                        <div class="col-md-6 mt-0">
                          <label class="form-check-label">To:</label>
                          <input type="datetime-local" id="multicol-username" name="durationto" class="form-control" required/>
                        </div>
                      </div>

                      <div class="row g-3 mb-3">
                        <div class="col-md-12">
                          <label class="form-label" for="multicol-first-name">Obituary Description:</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                          @if ($errors->has('description'))
                            <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('description') }}</span></small>
                          @endif
                        </div>
                      </div>

                      
                      <hr class="mb-4 mt-2">
                      
                      <h5>Payment method</h5>

                      <div class="row g-3 mb-3">
                        <label class="form-label" for="multicol-username">Location of deceased:</label>
                        <div class="row">
                            <div class="col-md-6 mt-0">
                                <label class="form-check-label">Mode of Payment:</label>
                                <select id="Category" class="select form-select" name="mop" data-allow-clear="true" onchange="toggleFileInput()" required>
                                    <option value="">-</option>
                                    <option value="GCASH">Gcash</option>
                                    <option value="CASH">Cash</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-0" id="fileInputContainer" style="display: none;">
                                <label class="form-check-label">Proof of Payment:</label>
                                <input type="file" id="multicol-username" name="pop" class="form-control"/>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-md-8 mt-0">
                            
                          </div>
                          <div class="col-md-4 mt-0" id="imageInputContainer" style="display: none;">
                              <label class="form-check-label">Scan to pay:</label>
                              <img src="../../../../../../images/qr/QR.JPG" class="form-control">
                          </div>
                        </div>

                      </div>

                </div>
              </div>
    
          </div>

          <div class="col-lg-4">
            <div class="accordion stick-top accordion-bordered course-content-fixed" id="courseContent">
              <div class="accordion-item shadow-none border border-bottom-0 active mb-0">

                <div class="accordion-header" id="headingOne">
                  <button type="button" class="accordion-button bg-lighter rounded-0" disabled>
                    <span class="d-flex flex-column">
                      <span class="h5 mb-1">{{$package->name}}</span>
                      <span class="fw-normal">Availed Package</span>
                    </span>
                  </button>
                </div>
                
                <div class="accordion" >
                  <div class="accordion-body py-3 border-top border-bottom">

                    <h6>Price Details</h6>

                    <p>{{$package->description}}</p>

                    <h6>Inclusions:</h6>

                    @foreach($package->services as $index => $service)
                      @php
                          $counter = $index + 1;
                      @endphp
                      <div class="form-check d-flex align-items-center mb-3">
                          <label for="defaultCheck" class="form-check-label ms-3">
                              <span class="mb-0 h6">{{ $counter }}. {{$service->name}}</span>
                              <span class="text-muted d-block">₱ {{$service->price}}</span>
                          </label>
                      </div>
                    @endforeach
                    <hr class="mb-4 mt-2">

                    <div class="form-check d-flex align-items-center mb-3">
                          <label for="defaultCheck" class="form-check-label ms-3">
                              <span class="mb-0 h6">Total Price</span>
                              <span class="text-muted d-block">₱ {{$package->price}}</span>
                          </label>
                      </div>


                  </div>
                </div>
              </div>

                <button type="submit" class="btn btn-primary d-grid w-100 mb-2 mt-2" data-bs-toggle="offcanvas" data-bs-target="#addPaymentOffcanvas">
                  <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-dollar bx-xs me-1"></i>Place Order</span>
                </button>

                <button class="btn btn-secondary d-grid w-100" onclick="history.back()">
                    <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-back bx-xs me-1"></i>Back</span>
                </button>

              
            </div>
          </div>
        </div>
      </div>
    </form>


  </div>
  <!-- / Content -->     
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script>
    function toggleFileInput() {
        var selectedOption = document.getElementById("Category").value;
        var fileInputContainer = document.getElementById("fileInputContainer");
        var imageInputContainer = document.getElementById("imageInputContainer");

        console.log('HEY')
        if (selectedOption === "GCASH") {
            fileInputContainer.style.display = "block";
            imageInputContainer.style.display = "block"
        } else {
            fileInputContainer.style.display = "none";
            imageInputContainer.style.display = "none"
        }
    }
    
    function handleCasketOptionChange() {
        // Hide all collapse elements
        $('.collapse').collapse('hide');
        // Show the selected collapse element
        $($(this).data('target')).collapse('show');
    }

    // Attach the function to the change event of the radio buttons
    $('input[name="casketOption"]').change(handleCasketOptionChange);
</script>
@endsection