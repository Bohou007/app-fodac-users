<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Paul Elie Bohoussou -- +225 0779362518">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{page_title($title ?? '')}}</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('images/fodac-logo-mini.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/fontawesome.min.css') }}" type="text/css" defer>
  <!-- Page plugins -->


    <link rel="stylesheet" href="{{ asset('assets/vendor/quill/dist/quill.core.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('assets/vendor/dropzone/dist/min/basic.min.css') }}" defer>

  <link rel="stylesheet" href="{{ asset('assets/vendor/animate.css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style1.css') }}" defer>

    <!-- STYLE CSS -->
  @yield('styleCss')
  <!-- Argon CSS -->
    <script src="{{ asset('steps_form/js/jquery-3.3.1.min.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <!-- Page plugins -->
  <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.1.0') }}" type="text/css">
  <script>
    $(document).ready(function () {
      $('.cui-initial-loading').delay(200).fadeOut(400)
    })
  </script>
    <script src="{{ asset('js/index.js') }}" defer></script>
</head>
