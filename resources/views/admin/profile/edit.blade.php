@extends('layouts.appAdn', ['title'=>'Modification de mon Profile'])



@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Information de l'utilisateur </h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('profile.index') }}" class="btn btn-sm btn-fodac-1">
                                <i class="ni ni-single-02"></i>
                                Mon profile
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-lg-12">

                        <form action="{{ route('admin.profile.update', Auth::user()->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="firstname">Prenoms</label>
                                        <input type="text" id="firstname" class="form-control" name="firstname"
                                            placeholder="First name" value="{{ Auth::user()->first_name }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
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
                                            value="{{ Auth::user()->email }}" readonly placeholder="jesse@example.com">
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="password">Mot de passe</label>
                                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                            value="{{ old('password') }}">
                                        @error('password')
                                            <span class="invalid-feedback text-left" role="alert">
                                                <strong>{!! $message !!}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="password_confirmation">Confirmation de
                                            mot de
                                            passe</label>
                                        <input type="password" id="password_confirmation"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password_confirmation" value="{{ old('password') }}">
                                    </div>
                                </div>
                            </div>


                            <center>
                                <button type="submit" class="btn btn-fodac-1">Enregistrer vos modifications</button>
                            </center>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
