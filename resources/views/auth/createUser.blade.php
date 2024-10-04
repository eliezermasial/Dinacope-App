@section('title','créer un compte')
<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/typicons.font/font/typicons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-8 mx-auto">
            <div class="table-dark text-left py-5 px-4 px-sm-5">
              <div class="brand-logo ">
                <img src="../../images/logo.svg" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" action="{{route('Auth.login.store')}}" method="POST">
                @csrf
                
                @include('shared.input', ['class'=>'form-control form-control-lg', 'name'=>'nom','placeholder'=>'Username'])
                @include('shared.input', ['class'=>'form-control form-control-lg', 'name'=>'prenom','placeholder'=>'Userprenom'])
                @include('shared.input', ['class'=>'form-control form-control-lg', 'name'=>'email', 'placeholder'=>'Email'])
                @include('shared.input', ['class'=>'form-control form-control-lg', 'name'=>'phone', 'placeholder'=>'+243.....'])
                @include('shared.input', ['class'=>'form-control form-control-lg', 'name'=>'password', 'placeholder'=>'password'])
                @include('shared.input', ['class'=>'form-control form-control-lg', 'name'=>'nom_antenne', 'placeholder'=>'nom d\'antenne'])
                <div class="form-group">
                  <label for="roleLabel">Role</label>
                  <select name="role" id="role" class="form-control">
                    <option value="agent">
                        Agent
                    </option>
                    <option value="chef_antenne">
                        chef d'antenne
                    </option>
                </select>
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Creation</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="{{route('Auth.login')}}" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
