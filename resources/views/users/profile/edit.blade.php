@extends('layouts.app', ['title'=>'Modification de mon Profile'])



@section('content')
    <div class="row">
        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row col-12">

                <div class="col-xl-6 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Information de l'utilisateur </h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="#!" class="btn btn-sm btn-fodac-2">
                                        <i class="ni ni-single-02"></i>
                                        Mon profile
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="firstname">Prenoms</label>
                                            <input type="text" id="firstname" class="form-control" name="firstname"
                                                placeholder="First name" value="{{ Auth::user()->first_name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="lastname">Nom de famille</label>
                                            <input type="text" id="lastname" class="form-control" name="lastname"
                                                value="{{ Auth::user()->last_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Contact</label>
                                            <input type="text" id="input-username" class="form-control" placeholder=""
                                                readonly value="{{ Auth::user()->contact }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Adresse E-Mail</label>
                                            <input type="email" id="input-email" class="form-control"
                                                value="{{ Auth::user()->email }}" readonly
                                                placeholder="jesse@example.com">
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="password">Mot de passe</label>
                                            <input type="password" id="password" class="form-control" name="password"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="password_confirmation">Confirmation de
                                                mot de
                                                passe</label>
                                            <input type="password" id="password_confirmation" class="form-control"
                                                name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-6 order-xl-2">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <!-- Title -->
                            <h5 class="h3 mb-0">Profil de compte</h5>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">

                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Voulez vous changer de
                                                profile</label>
                                            <select class="form-control" id="profils" name="profil" size="1">
                                                <option value="">Selectionné votre profile</option>
                                                <option value="1" @if (Auth::user()->profil == 1) selected="selected" @endif>Entreprise
                                                </option>
                                                <option value="2" @if (Auth::user()->profil == 2) selected="selected" @endif>personnelle
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="getCorporate">

                                    <hr class="my-4">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="namecorporate">Nom de
                                                    l'Entreprise</label>
                                                <input type="text" name="namecorporate" id="namecorporate"
                                                    class="form-control @error('namecorporate') is-invalid @enderror"
                                                    value="{{ Auth::user()->name_corporate }}">
                                                @error('namecorporate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="emailcorporate">Adresse E-mail de
                                                    l'Entreprise</label>
                                                <input type="email" id="emailcorporate" name="emailcorporate"
                                                    class="form-control @error('emailcorporate') is-invalid @enderror"
                                                    value="{{ Auth::user()->email_corporate }}">
                                                @error('emailcorporate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="contactcorporate">Contact
                                                    Entreprise</label>
                                                <input type="text" name="contactcorporate" id="contactcorporate"
                                                    class="form-control @error('contactcorporate') is-invalid @enderror"
                                                    placeholder="" value="{{ Auth::user()->contact_corporate }}">
                                                @error('contactcorporate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="registcorporate">Registre de
                                                    commerce</label>
                                                <input type="text" name="registcorporate" id="registcorporate"
                                                    class="form-control @error('registcorporate') is-invalid @enderror"
                                                    value="{{ Auth::user()->regist_corporate }}">
                                                @error('registcorporate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="addresscorporate">Siege de
                                                    l'Entreprise</label>
                                                <input type="text" id="addresscorporate" name="addresscorporate"
                                                    class="form-control @error('addresscorporate') is-invalid @enderror"
                                                    value="{{ Auth::user()->address_corporate }}">
                                                @error('addresscorporate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 order-xl-2">
                    <div class="card">
                        <div class="card-header">
                            <center>
                                <button type="submit" class="btn btn-fodac-2">Enregistrer vos modifications</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
