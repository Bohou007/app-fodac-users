@extends('layouts.appAdn', ['title' => 'MODIFIER UTILISATEUR'])

@section('css')

    <style>

    </style>

@endsection

@php
$etoile = '<span class="text-danger">*</span>';
$champsObligatoire = '<p class="text text-danger h4"> (*)  Champs obligatoires</p>';
@endphp

@section('content')
    <section id="main-content">
        <section class="wrapper pt-5 px-5">
            {{-- <h3 class="title"><i class="fa fa-angle-right"></i> Modification utilisateur</h3> --}}
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <!-- Formulaire de creation de role -->
                <div class="col-8 mx-auto bg-white shadow p-5 mb-5" id="">
                    <form class="style-form" action="{{ route('compte.users.update', $user) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="col-md-12 input-group-lg">
                            <div class="col-lg-12">
                                @include('flash::message')
                            </div>
                            <div class="col-lg-12 mb-1">
                                <div class="col-lg-6 mb-3 p-0 ">
                                    <h3 class="mb title"> Infos utilisateur</h3>
                                </div>
                                <div class="col-lg-6 mb-3 p-0">
                                    <h4 class="mb text-uppercase title"> <a class="btn btn-fodac-1" href=""><i
                                                class="fa fa-list"></i> Utilisateurs</a> </h4>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label class="title" for="last_name">Nom{!! $etoile !!}</label>
                                <input type="text" name="last_name" class="form-control"
                                    value="{{ old('last_name', $user->last_name) }}" readonly>
                                @if ($errors->has('last_name'))<p class="text-danger">{{ $errors->first('last_name') }}</p> @endif
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="title" for="first_name">Prénom{!! $etoile !!}</label>
                                <input type="text" name="first_name" class="form-control"
                                    value="{{ old('first_name', $user->first_name) }}" readonly>
                                @if ($errors->has('first_name'))<p class="text-danger">{{ $errors->first('first_name') }}</p> @endif
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label class="title" for="email">Adresse email{!! $etoile !!}</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" readonly>
                                @if ($errors->has('email'))<p class="text-danger">{{ $errors->first('email') }}</p> @endif
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label class="title" for="contact">Numéro{!! $etoile !!}</label>
                                <input type="text" name="contact" class="form-control"
                                    value="{{ old('contact', $user->contact) }}" readonly>
                                @if ($errors->has('contact'))<p class="text-danger">{{ $errors->first('contact') }}</p> @endif
                            </div>
                        </div>

                        <div class="col-md-12 input-group-lg mt-5">
                            <div class="col-lg-12">
                                <h4 class="mb title"> Rôle de l'utilisateur</h4>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label class="title" for="roles">Choisissez son rôle{!! $etoile !!}</label>
                                <select class="form-control" tabindex="1" name="roles">
                                    <option value=""> --- --- </option>
                                    @foreach ($roles as $role)
                                        @dump($role->user)
                                            <option value="{{ $role->id }}" @if($user->hasRole($role->name)) selected @endif>{{ $role->name }}</option>
                                            {{-- <option value="{{ $role->id }}">{{ $role->name }}</option> --}}
                                    @endforeach
                                </select>
                                @if ($errors->has('roles'))<p class="text-danger">{{ $errors->first('roles') }}</p> @endif
                            </div>
                        </div>

                        <div class="col-md-12 input-group-lg mt-5">
                            <div class="col-lg-12 mb-3">
                                <button type="reset" id="" class="btn btn-warning btn-lg mr-3"><i
                                        class="fa fa-undo"></i> Annuler</button>
                                <button type="submit" id="enregistrer" class="btn btn-fodac-1 btn-lg"><i
                                        class="fa fa-check"></i> Valider</button>
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
    {{-- @include('scriptsjs.enregistrement') --}}
@endsection
