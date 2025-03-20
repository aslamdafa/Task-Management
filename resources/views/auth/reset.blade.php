<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Reset Password - Ramadhan Mart</title>
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-success">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
              </div>
<form action="{{ route('password.update') }}" method="POST" class="user">
                <div class="form-group">
                  <input name="password" type="password" class="form-control form-control-user" placeholder="Password Baru..." required>
                </div>
                <div class="form-group">
                  <input name="password_confirmation" type="password" class="form-control form-control-user" placeholder="Konfirmasi Password Baru..." required>
                </div>
                <button type="submit" class="btn btn-success btn-block btn-user">Set Password Baru</button>

                @csrf
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                  </div>
                @endif
                <div class="form-group">
                    <input name="email" type="email" class="form-control form-control-user" placeholder="Email Anda..." required>
                </div>
     


              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="{{ route('login') }}">Kembali ke Masuk</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
