<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        Réinitialiser votre mot de passe - Fodac
    </title>
    <link href="{{ asset('images/fodac-logo-mini.png') }}" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i" rel="stylesheet">

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

    @yield('css')

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

        .cui-menu-left-logo {
            height: 64px;
            display: block;
            background: #fff !important;
            padding: 13px 20px 15px 22px;
            overflow: hidden;
        }

        .cui-menu-left-logo img {
            height: 55px !important;
        }

    </style>
    <script>
        $(document).ready(function() {
            $('.cui-initial-loading').delay(200).fadeOut(400)
        })
    </script>
</head>

<body class="cui-config-borderless cui-menu-colorful cui-menu-left-shadow">
    <div class="cui-initial-loading"></div>

    <div class="cui-login" style="background-image: url({{ asset('images/bg-rvegister.jpg') }})">

        <div class="cui-login-block cui-login-block-extended">
            <div class="row">
                <div class="col-xl-12">
                    <center>
                        <img src="{{ asset('images/fodac-logo-mini.png') }}" alt="FODAC" srcset="">
                    </center>
                    <div class="cui-login-block-inner">
                        <div class="cui-login-block-form">
                            <h4 class="text-uppercase">
                                <strong>Réinitialiser votre mot de passe</strong>
                            </h4>
                            <br />
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="js-form1 validation" action="{{ route('password.email') }}"
                                id="form-validations" name="form-validations" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Addresse E-mail</label>
                                    <input id="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Adresse Email" name="email" type="email" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-actions">
                                    <div class="text-center font-weight-light">
                                        <button type="submit"
                                            class="btn btn-block btn-fodac-2 mr-3">{{ __('Envoyer le lien de réinitialisation') }}</button>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">
                                        Vous n'avez pas de compte ? <a href="{{ route('register') }}"
                                            class="text-primary cui-utils-link-blue cui-utils-link-underlined">Créer un
                                            compte</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="cui-login-block-sidebar" style="background-color:#85562a !important; ">
                            <h4 class="cui-login-block-sidebar-title">
                                <strong>Fodac</strong>

                                <span>Guinee</span>
                            </h4>
                            <div class="cui-login-block-sidebar-item" style="color: #fff !important;">
                                Ipsum has been the industry's standard dummy text ever since the 1500s.
                            </div>
                            <div class="cui-login-block-sidebar-place">
                                <i class="icmn-location mr-3">
                                    <!-- -->
                                </i>
                                Abidjan, Cote d'Ivoire
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- END: pages/cui-login-beta -->


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
