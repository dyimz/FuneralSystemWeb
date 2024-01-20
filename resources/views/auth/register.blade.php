<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-wide " dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="front-pages">
    @include('layouts.landing.header')
    <body>
    @include('layouts.landing.navbar')

        <div class="authentication-wrapper authentication-cover">
            <div class="authentication-inner row m-0">

                <!-- Left Text -->
                <div class="d-none d-lg-flex col-lg-4 align-items-center justify-content-end p-5 pe-0">
                    <div class="w-px-400">
                        <img src="../../assets/img/illustrations/create-account-light.png" class="img-fluid" alt="multi-steps" width="600">
                    </div>
                </div>
                <!-- /Left Text -->

                <!--  Multi Steps Registration -->
                <div class="d-flex col-lg-8 align-items-center justify-content-center authentication-bg p-sm-5 p-3">
                    <div class="w-px-700">
                        <div id="multiStepsValidation" class="bs-stepper shadow-none">
                        <div class="bs-stepper-header border-bottom-0">
                            <div class="step" data-target="#accountDetailsValidation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="bx bx-home-alt"></i></span>
                                <span class="bs-stepper-label mt-1">
                                <span class="bs-stepper-title">Account</span>
                                <span class="bs-stepper-subtitle">Account Details</span>
                                </span>
                            </button>
                            </div>
                            <div class="line">
                            <i class="bx bx-chevron-right"></i>
                            </div>
                            <div class="step" data-target="#personalInfoValidation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="bx bx-user"></i></span>
                                <span class="bs-stepper-label mt-1">
                                <span class="bs-stepper-title">Personal</span>
                                <span class="bs-stepper-subtitle">Enter Information</span>
                                </span>
                            </button>
                            </div>
                            <div class="line">
                            <i class="bx bx-chevron-right"></i>
                            </div>
                            <div class="step" data-target="#billingLinksValidation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="bx bx-detail"></i></span>
                                <span class="bs-stepper-label mt-1">
                                <span class="bs-stepper-title">Validation</span>
                                <span class="bs-stepper-subtitle">Payment & Discount</span>
                                </span>
                            </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form id="multiStepsForm" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                            <!-- Account Details -->
                            <div id="accountDetailsValidation" class="content">
                                <div class="content-header mb-3">
                                <h3 class="mb-1">Account Information</h3>
                                <span>Enter Your Account Details</span>
                                </div>
                                <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="johndoe" value="{{ old('username') }}"/>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" value="{{ old('email') }}"/>
                                    @if($errors->has('email'))
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6 form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password2" value="{{ old('password') }}"/>
                                    <span class="input-group-text cursor-pointer" id="password2"><i class="bx bx-hide"></i></span>
                                    </div>
                                    @if($errors->has('password'))
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6 form-password-toggle">
                                    <label class="form-label" for="">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password_confirmation" value="{{ old('password_confirmation') }}"/>
                                    <span class="input-group-text cursor-pointer" id="password_confirmation"><i class="bx bx-hide"></i></span>
                                    </div>
                                    @if($errors->has('password_confirmation'))
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $errors->first('password_confirmation') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <button id="prevBtn1" class="btn btn-label-secondary btn-prev" disabled> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button id="nextBtn1" class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
                                </div>
                                </div>
                            </div>
                            <!-- Personal Info -->
                            <div id="personalInfoValidation" class="content">
                                <div class="content-header mb-3">
                                    <h3 class="mb-1">Personal Information</h3>
                                    <span>Enter Your Personal Information</span>
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="fname">First Name</label>
                                        <input type="text" id="fname" name="fname" class="form-control" placeholder="John" value="{{ old('fname') }}"/>
                                        @if($errors->has('fname'))
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $errors->first('fname') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="lname">Last Name</label>
                                        <input type="text" id="lname" name="lname" class="form-control" placeholder="Doe" value="{{ old('lname') }}"/>
                                        @if($errors->has('lname'))
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $errors->first('lname') }}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="birthdate">Birthday</label>
                                        <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{ old('birthdate') }}"/>
                                        @if($errors->has('birthdate'))
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $errors->first('birthdate') }}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="sex">Sex</label>
                                        <select id="sex" class="select form-select" name="sex" data-allow-clear="true">
                                            <option value="">Select</option>
                                            <option value="MALE" {{ old('sex') == 'MALE' ? 'selected' : '' }}>MALE</option>
                                            <option value="FEMALE" {{ old('sex') == 'FEMALE' ? 'selected' : '' }}>FEMALE</option>
                                        </select>
                                        @if($errors->has('sex'))
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $errors->first('sex') }}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="contact">Mobile</label>
                                        <input type="text" id="contact" name="contact" class="form-control multi-steps-mobile" placeholder="09** *** ****" value="{{ old('contact') }}"/>
                                        @if($errors->has('contact'))
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $errors->first('contact') }}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label" for="custimage">Upload Image</label>
                                        <input type="file" id="custimage" name="custimage" class="form-control"/>
                                        @if($errors->has('custimage'))
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $errors->first('custimage') }}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label" for="address">Address</label>
                                        <input type="text" id="address" name="address" class="form-control" placeholder="Address" value="{{ old('address') }}"/>
                                        @if($errors->has('address'))
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-12 d-flex justify-content-between">
                                        <button id="prevBtn2" class="btn btn-primary btn-prev"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button id="nextBtn2" class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- Billing Links -->
                            <div id="billingLinksValidation" class="content">
                                <div class="content-header mb-3">
                                    <h3 class="mb-1">Upload Valid ID</h3>
                                    <span>Verification for Discount</span>

                                    </div>
                                    <!-- Custom plan options -->
                                    <div class="row g-3">

                                        <div class="col-sm-6">
                                            <label class="form-label" for="idtype">ID Type</label>
                                            <input type="text" id="idtype" name="idtype" class="form-control" placeholder="Ex. Senior Citizen ID" value="{{ old('idtype') }}" required/>
                                            @if($errors->has('idtype'))
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                {{ $errors->first('idtype') }}
                                            </div>
                                            @endif
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="form-label" for="validid">Upload ID</label>
                                            <input type="file" id="validid" name="validid" class="form-control" required/>
                                            @if($errors->has('validid'))
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                {{ $errors->first('validid') }}
                                            </div>
                                            @endif
                                        </div>

                                        <div class="col-md">
                                            <label class="form-label" for="custgcashqr">Upload Gcash QR (if applicable)</label>
                                            <input type="file" id="custgcashqr" name="custgcashqr" class="form-control"/>
                                            @if($errors->has('custgcashqr'))
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                {{ $errors->first('custgcashqr') }}
                                            </div>
                                            @endif
                                        </div>

                                        <div class="col-12 d-flex justify-content-between">
                                            <button id="prevBtn3" class="btn btn-primary btn-prev"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button type="submit" class="btn btn-success btn-next btn-submit">Submit</button>
                                        </div>

                                    </div>
                                </div>
                                <!--/ Credit Card Details -->
                            </div>
                            </form>


                        </div>
                        </div>
                    </div>
                </div>
                <!-- / Multi Steps Registration -->
            </div>
        </div>


    </body>

    @include('layouts.landing.script')

    <!-- Page JS -->
    <script src="../../assets/js/pages-auth-multisteps.js"></script>

    <script>
    $(document).ready(function () {
        // Add click event listener to the button
        $("#submitBtn").on("click", function () {
            // Manually submit the form
            $("#multiStepsForm").submit();
        });

        $("#nextBtn1").on("click", function () {
            // Perform any additional logic here if needed
            
            // Prevent form submission
            return false;
        });

        $("#prevBtn1").on("click", function () {
            // Perform any additional logic here if needed
            
            // Prevent form submission
            return false;
        });


        $("#nextBtn2").on("click", function () {
            // Perform any additional logic here if needed
            
            // Prevent form submission
            return false;
        });

        $("#prevBtn2").on("click", function () {
            // Perform any additional logic here if needed
            
            // Prevent form submission
            return false;
        });

        $("#prevBtn3").on("click", function () {
            // Perform any additional logic here if needed
            
            // Prevent form submission
            return false;
        });
    });
</script>
  
</html>