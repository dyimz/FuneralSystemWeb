<!DOCTYPE html>
<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

  
<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/auth-login-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Nov 2023 09:07:42 GMT -->
@include('layouts.landing.header')

<body>


  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
              <div class="app-brand justify-content-center">
                  <a href="/" class="app-brand-link gap-2">
                      <span class="app-brand-text demo text-body fw-bold">Sneat</span>
                  </a>
              </div>
            <!-- /Logo -->
            <h4 class="mb-2">Welcome to PIKES! 👋</h4>
            <p class="mb-4">Please sign-in to your account.</p>
            @if ($errors->has('email'))
              <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('email') }}</span></small>
            @endif

            @if ($errors->has('status'))
              <small class="text-light fw-medium"><span class="badge bg-label-danger">{{ $errors->first('status') }}</span></small>
            @endif
            <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}" >
              @csrf
             
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus>
              </div>
              <div class="mb-3 form-password-toggle">
                <!-- <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a href="auth-forgot-password-basic.html">
                    <small>Forgot Password?</small>
                  </a>
                </div> -->
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me">
                  <label class="form-check-label" for="remember-me">
                    Remember Me
                  </label>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
              </div>
            </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/popper/popper.js"></script>
  <script src="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/js/bootstrap.js"></script>
  <script src="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/hammer/hammer.js"></script>
  <script src="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/i18n/i18n.js"></script>
  <script src="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
  <script src="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/js/menu.js"></script>
    
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js"></script>
  <script src="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js"></script>
  <script src="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js"></script>

  <!-- Main JS -->
  <script src="../../../../../../../../../../../../../../../../../../../../../../assets/js/main-login.js"></script>
  

  <!-- Page JS -->
  <script src="../../../../../../../../../../../../../../../../../../../../../../assets/js/pages-auth.js"></script>

</body>
</html>


