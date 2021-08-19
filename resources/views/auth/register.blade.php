<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        Inscription - Fodac
    </title>
    <link href="{{ asset('images/fodac-logo-mini.png') }}" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- VENDORS -->
    <!-- v2.0.2 -->
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/vendors/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/vendors/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/vendors/ladda/dist/ladda-themeless.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/vendors/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/vendors/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/vendors/tempus-dominus-bs4/build/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/vendors/fullcalendar/dist/fullcalendar.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/vendors/bootstrap-sweetalert/dist/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/vendors/summernote/dist/summernote.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/vendors/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/vendors/ionrangeslider/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/r-2.2.2/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/vendors/c3/c3.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/vendors/chartist/dist/chartist.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/vendors/nprogress/nprogress.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/vendors/jquery-steps/demo/css/jquery.steps.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/vendors/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/vendors/font-linearicons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/vendors/font-icomoon/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/vendors/font-awesome/css/font-awesome.min.css') }}">
    <script src="{{ URL::asset('cleanui/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/jquery-mousewheel/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/spin.js/spin.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/ladda/dist/ladda.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/html5-form-validation/dist/jquery.validation.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/jquery-typeahead/dist/jquery.typeahead.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/autosize/dist/autosize.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/bootstrap-show-password/bootstrap-show-password.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/tempus-dominus-bs4/build/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <script src="{{ URL::asset('cleanui/vendors/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/bootstrap-sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/summernote/dist/summernote.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/ionrangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/nestable/jquery.nestable.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/r-2.2.2/datatables.min.js">
    </script>
    <script src="{{ URL::asset('cleanui/vendors/editable-table/mindmup-editabletable.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/d3/d3.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/c3/c3.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js') }}">
    </script>
    <script src="{{ URL::asset('cleanui/vendors/jquery-countTo/jquery.countTo.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/nprogress/nprogress.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/d3-dsv/dist/d3-dsv.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/d3-time-format/dist/d3-time-format.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/techan/dist/techan.min.js') }}"></script>

    <!-- CLEAN UI HTML ADMIN TEMPLATE MODULES-->
    <!-- v2.0.2 -->
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/core/common/core.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/core/widgets/widgets.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/vendors/common/vendors.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/settings/common/settings.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/settings/themes/themes.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/menu-left/common/menu-left.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/menu-top/common/menu-top.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/menu-right/common/menu-right.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/top-bar/common/top-bar.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/breadcrumbs/common/breadcrumbs.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/footer/common/footer.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/pages/common/pages.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/ecommerce/common/ecommerce.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/apps/common/apps.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/blog/common/blog.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/youtube/common/youtube.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/github/common/github.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cleanui/components/docs/common/docs.cleanui.css') }}">
    <script src="{{ URL::asset('cleanui/components/menu-left/common/menu-left.cleanui.js') }}"></script>
    <script src="{{ URL::asset('cleanui/components/menu-top/common/menu-top.cleanui.js') }}"></script>
    <script src="{{ URL::asset('cleanui/components/menu-right/common/menu-right.cleanui.js') }}"></script>
    <script src="{{ URL::asset('cleanui/components/blog/common/blog.cleanui.js') }}"></script>
    <script src="{{ URL::asset('cleanui/components/github/common/github.cleanui.js') }}"></script>

    <!-- PRELOADER STYLES-->
    <style>
        .cui-initial-loading {
            position: fixed;
            z-index: 99999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-position: center center;
            background-repeat: no-repeat;
            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDFweCIgIGhlaWdodD0iNDFweCIgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIiBjbGFzcz0ibGRzLXJvbGxpbmciPiAgICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBuZy1hdHRyLXN0cm9rZT0ie3tjb25maWcuY29sb3J9fSIgbmctYXR0ci1zdHJva2Utd2lkdGg9Int7Y29uZmlnLndpZHRofX0iIG5nLWF0dHItcj0ie3tjb25maWcucmFkaXVzfX0iIG5nLWF0dHItc3Ryb2tlLWRhc2hhcnJheT0ie3tjb25maWcuZGFzaGFycmF5fX0iIHN0cm9rZT0iIzAxOTBmZSIgc3Ryb2tlLXdpZHRoPSIxMCIgcj0iMzUiIHN0cm9rZS1kYXNoYXJyYXk9IjE2NC45MzM2MTQzMTM0NjQxNSA1Ni45Nzc4NzE0Mzc4MjEzOCIgdHJhbnNmb3JtPSJyb3RhdGUoODQgNTAgNTApIj4gICAgICA8YW5pbWF0ZVRyYW5zZm9ybSBhdHRyaWJ1dGVOYW1lPSJ0cmFuc2Zvcm0iIHR5cGU9InJvdGF0ZSIgY2FsY01vZGU9ImxpbmVhciIgdmFsdWVzPSIwIDUwIDUwOzM2MCA1MCA1MCIga2V5VGltZXM9IjA7MSIgZHVyPSIxcyIgYmVnaW49IjBzIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSI+PC9hbmltYXRlVHJhbnNmb3JtPiAgICA8L2NpcmNsZT4gIDwvc3ZnPg==);
            background-color: #f2f4f8;
        }

        .btn-fodac-2 {
            background-color: #85562A;
            border-color: #85562A;
            color: #fff;
        }

        .btn-fodac-2:hover {
            background-color: #69431f !important;
            color: #fff !important;
            border-color: #69431f !important;
        }

        .cui-menu-left-shadow .cui-menu-left-inner {
            -webkit-box-shadow: 0 0 200px -30px rgba(57, 55, 73, 0) !important;
            box-shadow: 0 0 200px -30px rgba(57, 55, 73, 0) !important;
            border: none !important;
        }

    </style>

    <link rel="stylesheet" href="{{ asset('css/auth/typeicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/vendor.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/auth/style.base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/oneui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/fontAwesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script>
        $(document).ready(function() {
            $('.cui-initial-loading').delay(200).fadeOut(400)
        })
    </script>
</head>


<body class="cui-config-borderless cui-menu-colorful cui-menu-left-shadow">
    <div class="cui-initial-loading"></div>
    <div class="cui-register" style="background-image: url({{ asset('images/bg-regisjter.jpg') }})">
        <div class="cui-register-block">
            <div class="row">
                <div class="col-xl-12">
                    <center>
                        <img src="{{ asset('images/fodac-logo-mini.png') }}" alt="FODAC" srcset="">
                    </center>
                    <div class="cui-register-block-inner" style="min-width: 69.07rem !important;">
                        <div class="cui-register-block-form">
                            <h4 class="text-uppercase text-center">
                                <strong> Créer votre compte </strong>
                            </h4>
                            <br />
                            <!-- Page Content -->
                            <div class="content content-narrow">

                                <!-- Wizards with Progress -->
                                <div class="row">
                                    <div class="col-xl-12">
                                        <!-- Classic Validation Wizard (.js-wizard-classic-validation class is initialized in js/pages/base_forms_wizard.js) -->
                                        <!-- For more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard -->
                                        <div class="js-wizard-classic-validation block">
                                            <!-- Step Tabs -->
                                            <ul class="nav nav-tabs nav-justified">
                                                <li class="actie">
                                                    <a class="inactive" href="#validation-classic-step1"
                                                        data-toggle="tab"> . </a>
                                                </li>
                                                <li>
                                                    <a class="inactive" href="#validation-classic-step2"
                                                        data-toggle="tab"> . </a>
                                                </li>

                                                <li>
                                                    <a class="inactive" href="#validation-classic-step3"
                                                        data-toggle="tab"> . </a>
                                                </li>
                                            </ul>
                                            <!-- END Step Tabs -->

                                            <!-- Form -->
                                            <!-- jQuery Validation (.js-form1 class is initialized in js/pages/base_forms_wizard.js) -->
                                            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                            <form class="js-form1 validation form-horizontal"
                                                action="{{ route('register') }}" method="POST"
                                                enctype="application/x-www-form-urlencoded">
                                                @csrf

                                                <input type="text" name="account_type" value="{{ __('OC') }}"
                                                    id="" hidden>
                                                <!-- Steps Content -->
                                                <div class="block-content tab-content">
                                                    <!-- Step 1 -->
                                                    <div class="tab-pane push-30-t push-50 active"
                                                        id="validation-classic-step1">
                                                        <div class="col-xl-12 mb-5">
                                                            <h4>1. Information personnelle</h4>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xl-12">
                                                                <label for="lastname">{{ __('Nom') }}</label>
                                                                <input id="lastname" type="text"
                                                                    placeholder="Entrer votre nom"
                                                                    class="form-control @error('lastname') is-invalid @enderror"
                                                                    name="lastname" value="{{ old('lastname') }}"
                                                                    autocomplete="lastname" autofocus>

                                                                @error('lastname')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xl-12">
                                                                <label for="firstname">{{ __('Prenoms') }}</label>
                                                                <input
                                                                    class="form-control @error('firstname') is-invalid @enderror"
                                                                    type="text" id="firstname" name="firstname"
                                                                    placeholder="Entrer vos prenoms"
                                                                    value="{{ old('firstname') }}"
                                                                    autocomplete="firstname" autofocus>
                                                                @error('firstname')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xl-12 mx-auto">
                                                                <label
                                                                    for="email">{{ __('Votre Adresse email') }}</label>
                                                                <input id="email" type="email"
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    placeholder="Entre votre adresse email" name="email"
                                                                    value="{{ old('email') }}" autocomplete="email">
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xl-12 mx-auto">
                                                                <label for="contact">{{ __('Contact') }}</label>
                                                                <input
                                                                    class="form-control @error('contact') is-invalid @enderror"
                                                                    type="tel" id="contact"
                                                                    value="{{ old('contact') }}"
                                                                    autocomplete="contact" name="contact"
                                                                    placeholder="Entrez votre numéro de téléphone">

                                                                @error('contact')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END Step 1 -->

                                                    <!-- Step 2 -->
                                                    <div class="tab-pane push-30-t push-50"
                                                        id="validation-classic-step2">
                                                        <div class="col-xl-12 mb-5">
                                                            <h4>2. Confidentialité (vos Access)</h4>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xl-12 mx-auto">
                                                                <label
                                                                    for="validation-classic-email">{{ __('Mot de passe') }}
                                                                </label>
                                                                <input id="password" type="password"
                                                                    class="form-control @error('password') is-invalid @enderror"
                                                                    placeholder="Entrer votre mot de passe"
                                                                    name="password" autocomplete="new-password">

                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xl-12 mx-auto">
                                                                <label
                                                                    for="validation-classic-email">{{ __('Confirmez votre mot de passe') }}</label>
                                                                <input id="password-confirm" type="password"
                                                                    class="form-control"
                                                                    placeholder="Confirmez votre mot de passe"
                                                                    name="password_confirmation"
                                                                    autocomplete="new-password">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- END Step 2 -->

                                                    <!-- Step 3 -->
                                                    <div class="tab-pane push-30-t push-50"
                                                        id="validation-classic-step3">
                                                        <div class="col-xl-12 mb-5">
                                                            <h4> 3. Information supplementaire </h4>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xl-12">
                                                                <label
                                                                    for="validation-classic-skills">{{ __('Quel est votre profile') }}</label>
                                                                <select class="form-control" id="profil" name="profil"
                                                                    size="1">
                                                                    <option value="">Veuillez sélectionner un element de reponse
                                                                    </option>
                                                                    <option value="1">Entreprise</option>
                                                                    <option value="2">personnelle</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div id="getProfil">
                                                            <div class="form-group">
                                                                <hr><br>
                                                                <div class="col-xl-12 bg-gray-light"
                                                                    style="padding:15px;">
                                                                    <h4>Profile Entreprise</h4>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-xl-12 mx-auto">
                                                                    <label
                                                                        for="namecorporate">{{ __('Nom de l\'entreprise') }}</label>
                                                                    <input id="namecorporate" type="text" required
                                                                        placeholder="Entrer votre nom entreprise"
                                                                        class="form-control @error('namecorporate') is-invalid @enderror"
                                                                        name="namecorporate"
                                                                        value="{{ old('namecorporate') }}"
                                                                        autocomplete="name" autofocus>

                                                                    @error('lastname')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-xl-12 mx-auto">
                                                                    <label
                                                                        for="emailcorporate">{{ __('Adresse email de l\'entreprise') }}</label>
                                                                    <input id="emailcorporate" type="email"
                                                                        class="form-control @error('emailcorporate') is-invalid @enderror"
                                                                        placeholder="Entre l'adresse email de votre entreprise"
                                                                        name="emailcorporate"
                                                                        value="{{ old('emailcorporate') }}"
                                                                        autocomplete="email">
                                                                    @error('emailcorporate')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-xl-12 mx-auto">
                                                                    <label
                                                                        for="contactcorporate">{{ __('Contact Entreprise') }}</label>
                                                                    <input
                                                                        class="form-control @error('contactcorporate') is-invalid @enderror"
                                                                        type="tel" id="contactcorporate"
                                                                        value="{{ old('contactcorporate') }}"
                                                                        autocomplete="tel" name="contactcorporate"
                                                                        placeholder="Entrez le numéro de téléphone de votre entreprise">

                                                                    @error('contactcorporate')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-xl-12 mx-auto">
                                                                    <label
                                                                        for="registcorporate">{{ __('Numero de registre de commerce de l\'entreprise') }}</label>
                                                                    <input
                                                                        class="form-control @error('registcorporate') is-invalid @enderror"
                                                                        type="text" id="registcorporate"
                                                                        value="{{ old('registcorporate') }}"
                                                                        autocomplete="number" name="registcorporate"
                                                                        placeholder="Entrez le registe de commerce de votre entreprise">
                                                                    @error('registcorporate')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-xl-12 mx-auto">
                                                                    <label
                                                                        for="addresscorporate">{{ __('Adresse de l\'entreprise') }}</label>
                                                                    <input
                                                                        class="form-control @error('addresscorporate') is-invalid @enderror"
                                                                        type="text" id="addresscorporate"
                                                                        value="{{ old('addresscorporate') }}"
                                                                        autocomplete="number" name="addresscorporate"
                                                                        placeholder="Entrez l'adresse de votre entreprise">
                                                                    @error('addresscorporate')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-xl-12">
                                                                <label class="css-input switch switch-sm switch-primary"
                                                                    for="validation-classic-terms">
                                                                    <input type="checkbox" id="validation-classic-terms"
                                                                        name="terms_conditions"><span></span> Accepter
                                                                    <a data-toggle="modal" data-target="#modal-terms"
                                                                        href="#">les termes et conditions</a>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        {{-- Fenetre Modal  (--- View data ---)  #debut --}}

                                                        <div class="modal fade" id="modal-terms" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalCenterTitle">Les termes et
                                                                            conditions
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Lorem, ipsum dolor sit amet consectetur
                                                                            adipisicing elit.
                                                                            Blanditiis ratione voluptatibus, fuga soluta
                                                                            repellendus iste vel at,
                                                                            odio dolor perferendis esse inventore nisi
                                                                            quo atque ex recusandae.
                                                                            Quos, et error.
                                                                        </p>
                                                                        <p>
                                                                            Lorem ipsum dolor sit amet, consectetur
                                                                            adipisicing elit.
                                                                            Quos eius rem accusantium soluta molestias
                                                                            enim incidunt
                                                                            similique harum libero. Dignissimos facere
                                                                            aperiam reprehenderit
                                                                            voluptatibus officiis necessitatibus amet,
                                                                            odio assumenda quia?
                                                                        </p>
                                                                        <p>
                                                                            Lorem ipsum dolor sit amet consectetur
                                                                            adipisicing elit.
                                                                            Nesciunt magni assumenda dolorem aliquid
                                                                            dolores facere.
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-dangers"
                                                                            data-dismiss="modal">Fermer</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        {{-- Fenetre Modal  #fin --}}

                                                    </div>
                                                    <!-- END Step 3 -->
                                                </div>
                                                <!-- END Steps Content -->

                                                <!-- Steps Navigation -->
                                                <div
                                                    class="block-content block-content-mini block-content-full border-t">
                                                    <div class="row col-xl-12">
                                                        <div class="col-md-6 col-xl-6">
                                                            <button class="wizard-prev btn btn-fodac-4 text-left"
                                                                type="button">
                                                                Précédent</button>
                                                        </div>
                                                        <div class="col-md-6 col-xl-6 block-right text-right">
                                                            <button class="wizard-next btn btn-fodac-2"
                                                                type="button">Suivant</button>
                                                            <button class="wizard-finish btn btn-fodac-2"
                                                                type="submit"><i class="fa fa-check"></i>
                                                                Enregistrer</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="text-center mt-4 font-weight-light">
                                                            Vous avez déja un compte ? <a
                                                                href="{{ route('login') }}"
                                                                class="text-primary cui-utils-link-blue cui-utils-link-underlined">Connectez-vous</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Steps Navigation -->
                                            </form>
                                            <!-- END Form -->
                                        </div>
                                        <!-- END Classic Validation Wizard -->
                                    </div>
                                </div>
                                <!-- END Wizards with Progress -->

                            </div>
                            <!-- END Page Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cui-register-footer text-center">
            <ul class="list-unstyled list-inline">
                <li class="list-inline-item"><a href="javascript: void(0);">Terms of Use</a></li>
                <li class="active list-inline-item"><a href="javascript: void(0);">Compliance</a></li>
                <li class="list-inline-item"><a href="javascript: void(0);">Confidential Information</a></li>
                <li class="list-inline-item"><a href="javascript: void(0);">Support</a></li>
                <li class="list-inline-item"><a href="javascript: void(0);">Contacts</a></li>
            </ul>
        </div>
    </div>
    <!-- END: pages/cui-login-beta -->

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> --}}
    <script>
        $(document).ready(function() {
            $("#getProfil").hide();
            $("#profil").change(function() {
                let select = document.getElementById("profil");
                let choice = select.selectedIndex // Récupération de l'index du <option> choisi

                let valeur_cherchee = select.options[choice].value;

                if (valeur_cherchee == 1) {
                    $("#getProfil").show();
                } else {
                    $("#getProfil").hide();
                }
            });

        })
    </script>
    <script>
        ;
        (function($) {
            'use strict'
            $(function() {
                $('#example-icons').steps({
                    headerTag: 'h3',
                    bodyTag: 'div',
                    transitionEffect: 'slideLeft',
                    autoFocus: true,
                })

                $('#example-numbers').steps({
                    headerTag: 'h3',
                    bodyTag: 'div',
                    transitionEffect: 'slideLeft',
                    autoFocus: true,
                })
            })
        })(jQuery)
    </script>
    <!-- START: page scripts -->
    <script>
        ;
        (function($) {
            'use strict'
            $(function() {
                // Form Validation
                $('#form-validation').validate({
                    submit: {
                        settings: {
                            inputContainer: '.form-group',
                            errorListClass: 'form-control-error',
                            errorClass: 'has-danger',
                        },
                    },
                })

                // Show/Hide Password
                $('.password').password({
                    eyeClass: '',
                    eyeOpenClass: 'icmn-eye',
                    eyeCloseClass: 'icmn-eye-blocked',
                })

                // Switch to fullscreen
                $('.switch-to-fullscreen').on('click', function() {
                    $('.cui-login').toggleClass('cui-login-fullscreen')
                })

                // Change BG
                $('.random-bg-image').on('click', function() {
                    var min = 1,
                        max = 5,
                        next = Math.floor($('.random-bg-image').data('img')) + 1,
                        final = next > max ? min : next

                    $('.random-bg-image').data('img', final)
                    $('.cui-login')
                        .data('img', final)
                        .css('backgroundImage', 'url(/cleanui/components/pages/common/img/login/' +
                            final + '.jpeg)')
                })
            })
        })(jQuery)
    </script>

    <script src="{{ asset('js/auth/base_forms_wizard.js') }}"></script>
    <script src="{{ asset('js/auth/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/auth/jquery.validate.min.js') }}"></script>
    <!-- END: page scripts -->


</body>

</html>
