@extends('layouts.app', ['title'=>'Mon Profile'])



@section('content')
    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
                <img src="../../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{ asset('images/icon-user-man.png') }}" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <br>
                </div>
                <div class="card-body pt-2">
                    <div class="text-center">
                        <h5 class="h3">
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </h5>
                        <div class="h5 font-weight-300">
                            @if (Auth::user()->profil == 1)
                                <span class="badge badge-primary">
                                    <i class="ni ni-building"></i>
                                    Compte Entreprise
                                </span>
                            @else
                                <span class="badge badge-primary">
                                    <i class="ni ni-single-02"></i>
                                    Compte Personnel
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card bg-gradient-fodac-1 border-0">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Dossier deposé</h5>
                                    <span class="h2 font-weight-bold mb-0 text-white">{{ count(Auth::user()->dossiers->where('status', 0)) }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                        <i class="ni ni-collection"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card bg-gradient-fodac-1 border-0">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Dossier validé</h5>
                                    <span class="h2 font-weight-bold mb-0 text-white">{{ count(Auth::user()->dossiers->where('status', 3)) }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                        <i class="ni ni-check-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Compte Utilisateurs </h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn btn-sm btn-fodac-2">Modifier mon compte</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <h6 class="heading-small text-muted mb-4">Information de l'utilisateur</h6>
                        <div class="pl-lg-4">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Prenoms</label>
                                        <input type="text" id="input-first-name" class="form-control" readonly
                                            placeholder="First name" value="{{ Auth::user()->first_name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Nom de famille</label>
                                        <input type="text" id="input-last-name" class="form-control" placeholder="Last name"
                                            readonly value="{{ Auth::user()->last_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Contact</label>
                                        <input type="text" id="input-username" class="form-control" placeholder="" readonly
                                            value="{{ Auth::user()->contact }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Adresse E-Mail</label>
                                        <input type="email" id="input-email" class="form-control"
                                            value="{{ Auth::user()->email }}" readonly placeholder="jesse@example.com">
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (Auth::user()->profil == 1)
                            <hr class="my-4">
                            <h6 class="heading-small text-muted mb-4">Information Entreprise</h6>
                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Nom de
                                                l'Entreprise</label>
                                            <input type="text" id="input-first-name" class="form-control" readonly
                                                value="{{ Auth::user()->name_corporate }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Adresse E-mail de
                                                l'Entreprise</label>
                                            <input type="email" id="input-last-name" class="form-control" readonly
                                                value="{{ Auth::user()->email_corporate }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Contact
                                                Entreprise</label>
                                            <input type="text" id="input-username" class="form-control" placeholder=""
                                                readonly value="{{ Auth::user()->contact_corporate }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Registre de commerce</label>
                                            <input type="email" id="input-email" class="form-control"
                                                value="{{ Auth::user()->regist_corporate }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Siege de
                                                l'Entreprise</label>
                                            <input type="text" id="input-username" class="form-control" placeholder=""
                                                readonly value="{{ Auth::user()->address_corporate }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
