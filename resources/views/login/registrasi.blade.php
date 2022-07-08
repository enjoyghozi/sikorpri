@section('title', 'Register')
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SI KORPRI - Register</title>
    <link rel = "icon" href = "{{ asset('img/logo-2.png') }}" type = "image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('style/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('style/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg w-100" style="margin-top: 100px">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img class="" src="{{ asset('img/korpri-register.png')}}" style='height: 100%; width: 100%; display: block;'>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun Anda!</h1>
                            </div>
                            <form action="{{ route('simpanregistrasi') }}" method="post"  class="user ml-5">
                            {{ csrf_field() }}
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="name" placeholder="Nama Lengkap" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email"placeholder="Email Address" required="required">
                                </div>
                                <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required="required">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('style/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('style/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('style/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('stylejs/sb-admin-2.min.js')}}"></script>

</body>

</html>