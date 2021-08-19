@extends('layouts.appAdn', ['title' => 'Nouvel utilisateurs'])

@section('textOnHead')

@endsection

@php
$etoile = '<span class="text-danger">*</span>';
$champsObligatoire = '<p class="text text-danger h4"> (*)  Champs obligatoires</p>';
@endphp

@section('content')
    <div class="row mx-auto">
        <!-- Formulaire de creation de role -->
        <div class="col-lg-8 bg-white shadow offset-2" id="">
            <form class="style-form" action="{{ route('admin.registered') }}" method="POST">
                @csrf
                <div class="col-md-12 input-group-lg">
                    <div class="col-lg-12">
                        @include('flash::message')
                    </div>
                    <div class="col-lg-12 text-right">
                        <h4 class="mb text-uppercase"> <a class="btn brook-btn"
                                href="{{ route('compte.users.index') }}"><i class="fa fa-list"></i> Utilisateurs</a>
                        </h4>
                    </div>
                    <div class="col-lg-12">
                        <hr>
                    </div>
                    <div class="col-lg-12 text-left">
                        <h4 class="mb title"> Infos utilisateur</h4>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label class="title" for="nom">Nom{!! $etoile !!}</label>
                        <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
                        @if ($errors->has('nom'))
                            <p class="text-danger">{{ $errors->first('nom') }}</p>
                        @endif
                    </div>

                    <div class="col-lg-12 mb-3">
                        <label class="title" for="prenom">Prénom{!! $etoile !!}</label>
                        <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}">
                        @if ($errors->has('prenom'))
                            <p class="text-danger">{{ $errors->first('prenom') }}</p>
                        @endif
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label class="title" for="email">Adresse email{!! $etoile !!}</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label class="title" for="contact">Numéro{!! $etoile !!}</label>
                        <input type="text" name="contact" class="form-control" value="{{ old('contact') }}">
                        @if ($errors->has('contact'))
                            <p class="text-danger">{{ $errors->first('contact') }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-12 input-group-lg mt-5">
                    <div class="col-lg-12">
                        <h4 class="mb title"> Rôle de l'utilisateur</h4>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label class="title" for="nom">Choisissez son rôle{!! $etoile !!}</label>
                        <select class="form-control" tabindex="1" name="roles">
                            <option value=""> --- --- </option>
                            @foreach ($roles as $role)
                                @if (old('roles') == $role->id)
                                    <option value="{{ $role->id }}" selected>{{ $role->display_name }}</option>
                                @else
                                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('display_name'))
                            <p class="text-danger">{{ $errors->first('display_name') }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-12 input-group-lg mt-5">
                    <div class="col-lg-12 mb-3">
                        <button type="reset" id="" class="btn btn-warning btn-lg mr-3"><i class="fa fa-undo"></i>
                            Annuler</button>
                        <button type="submit" id="enregistrer" class="btn btn-primarys btn-lg"><i class="fa fa-save"></i>
                            Enregistrer</button>
                    </div>
                </div>

            </form>
        </div>
        <!-- col-lg-12-->
    </div>
@endsection
