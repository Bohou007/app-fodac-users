@extends('layouts.app', ['title'=>'Consultations des dossiers'])

@section('content')
    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card " style="background-color: #3454a1 !important; color: #ffffff !important;">
                <!-- Card header -->
                <div class="card-header" style="background-color: #3454a1 !important; color: #ffffff !important;">
                    <!-- Title -->
                    <h5 class="h3 mb-0 text-white">Status du dossier</h5>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    @if ($dossier->status == 0)
                        <i class="bg-warning"></i>
                        <span class="status">
                            Pas en traitement
                        </span>
                    @elseif ($dossier->status == 1)
                        <i class="bg-warning"></i>
                        <span class="status">
                            En cours de traitement
                        </span>
                    @elseif ($dossier->status == 2)
                        <i class="bg-warning"></i>
                        <span class="status">
                            En attente de complement
                        </span>
                    @elseif ($dossier->status == 3)
                        <i class="bg-warning"></i>
                        <span class="status">
                            Dossier validé
                        </span>
                    @else
                        <i class="bg-warning"></i>
                        <span class="status">
                            Dossier échoué
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card border-0 bg-white">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-dark"> Nom Projet</h5>
                                    <span class="h2 font-weight-bold mb-0 text-dark">{{ $dossier->name }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                        <i class="ni ni-active-40"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card bg-white border-0">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-dark">Budget du projet</h5>
                                    <span class="h2 font-weight-bold mb-0 text-dark">{{ $dossier->budget_oc }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                        <i class="ni ni-spaceship"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username"> <b>Capitale</b></label> <br>
                                        {{ $dossier->capitale_oc }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email"><b>Capitale en fin
                                                d'activité</b></label><br>
                                        {{ $dossier->capitale_demander }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Description -->
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label"><b>Description du projet</b></label> <br>
                                {!! $dossier->description !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
