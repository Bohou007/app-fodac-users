@extends('layouts.appAdn')

@section('css')

<style>

</style>

@endsection

@php
  $etoile='<span class="text-danger">*</span>';
  $champsObligatoire = '<p class="text text-danger h4"> (*)  Champs obligatoires</p>';
@endphp

@section('content')
<section id="main-content">
  <section class="wrapper pt-5 px-5">
    <h3 class="text-dark"><i class="fa fa-angle-right"></i> Créer un nouveau rôle</h3>
    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
      <!-- Formulaire de creation de role -->
      <div class="col-lg-12 bg-white shadow p-5 mb-5" id="">
          <form class="style-form"action="{{route('admin.role.store')}}" method="POST">
            @csrf
            <div class="col-md-12 input-group-lg">
              <div class="col-lg-12">
                @include('flash::message')
              </div>
              <div class="col-lg-12 mb-1">
                <div class="col-lg-6 mb-3 p-0 text-left">
                  {{-- <h4 class="mb"> Infos utilisateur</h4> --}}
                </div>
                <div class="col-lg-6 mb-3 p-0 text-right">
                  <h4 class="mb text-uppercase"> <a class="btn brook-btn" href="{{route('admin.roles')}}"><i class="fa fa-list"></i> rôles</a> </h4>
                </div>
              </div>
              <div class="col-lg-12 mb-3">
                <label for="nom">Nom du rôle{!! $etoile !!}</label>
                <input type="text" name="display_name" class="form-control" value="{{old('display_name')}}">
                @if ($errors->has('display_name'))<p class="text-danger">{{ $errors->first('display_name') }}</p> @endif
              </div>

              @include('admin.roles._form')
            </div>

            <div class="col-md-12 input-group-lg mt-5">
              <div class="col-lg-12 mb-3">
                  <button type="reset" id="" class="btn btn-warning btn-lg mr-3"><i class="fa fa-undo"></i> Annuler</button>
                  <button type="submit" id="enregistrer" class="btn brook-btn btn-lg"><i class="fa fa-save"></i> Enregistrer</button>
              </div>
            </div>

          </form>
      </div>
      <!-- col-lg-12-->
    </div>
    <!-- /row -->

  </section>
  <!-- /wrapper -->
</section>

@endsection

@section('js')
  <script>
    //au clic du bouton enregistrer
    $("#envoyer").click(function(){
        $('#envoyer').html('<i class="fa fa-spin spiner"></i>Envoi en cours...');
    });
    $("#enregistrer").click(function(){
        $('#enregistrer').html('<i class="fa fa-spin spiner"></i>Enregistrement...');
    });
    $("#supprimer").click(function(){
        $('#supprimer').html('<i class="fa fa-spin spiner"></i>Suppression...');
    });

    // Au clic bouton valider demande
    $(document).on('click', '.valider', function(){
        $(this).html('<span class="mx-3"><i class="fas fa-circle-notch fa-spin fa-2x"></i></span>');
    });
</script>
@endsection
