<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CelestialUI Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('css/auth/typeicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/vendor.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/auth/style.base.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- endinject -->
    <!-- <link rel="shortcut icon" href="../../images/favicon.png" /> -->
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-5 mx-auto">
                        <div class="auth-form-light text-center py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src=" {{asset('images/fodac-logo.png')}} " alt="logo">
                            </div>
                            <h4>{{ __('Réinitialiser le mot de passe') }}</h4>
                            <h6 class="font-weight-light"Réinitialiser votre mot de passe</h6>
                            <form class="pt-3" method="POST" action="action="{{ route('password.update') }}">
                                @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}"
                                        name="email" required autocomplete="email" autofocus
                                        placeholder="Adresse email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password"
                                        id="exampleInputPassword1" placeholder="Mot de passe">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-lg
                                        name="password_confirmation" required autocomplete="new-password"
                                        id="exampleInputPassword1" placeholder="Confirmation de mot de passe">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-fodac-2 btn-lg font-weight-medium auth-form-btn">
                                        {{ __('Renetialiser son mot de passe') }}
                                    </button>
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
    <script src="{{ asset('js/auth/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('js/auth/off-canvas.js')}}"></script>
    <script src="{{ asset('js/auth/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('js/auth/template.js')}}"></script>
    <script src="{{ asset('js/auth/settings.js')}}"></script>
    <script src="{{ asset('js/auth/todolist.js')}}"></script>
    <!-- endinject -->
</body>

</html>
