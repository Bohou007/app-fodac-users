@extends('layouts.appAdn', ['title'=>'Consultations des dossiers'])

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
            <div class="card border-0 bg-white">
                <div class="card-header">
                    <!-- Title -->
                    <h5 class="h3 mb-0 text-dark">Document du dossier</h5>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    @forelse ( $dossier->pieceJointe as $pj )
                        <ul class="list-group list-group-flush list my--3">
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="{{ asset('documents/' . $pj->path_doc) }}" target="_blank"
                                            class="avatar rounded-circle mr-3">
                                            <img alt="Image placeholder" src="{{ asset('images/pdf-image.png') }}">
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            <a href="{{ asset('documents/' . $pj->path_doc) }}"
                                                target="_blank">{{ $pj->name_doc }}</a>
                                        </h4>
                                        <span class="text-success">●</span>
                                        <small>{{ $pj->type_doc }}</small>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ asset('documents/' . $pj->path_doc) }}"
                                            download="{{ $dossier->name }}_{{ $dossier->user->first_name }}-{{ $dossier->user->last_name }}_{{ $pj->name_doc }} - document_fodac.pdf"
                                            class="btn btn-sm btn-fodac-1">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    @empty
                        <div class="row">
                            <p>
                                -- No data --
                            </p>
                        </div>
                    @endforelse
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
            <div class="card">
                <div class="card-header">
                    <!-- Title -->
                    @if ($dossier->status == 3 || $dossier->status == 4)
                        <h5 class="h3 mb-0 text-dark">Resultat de la decision final</h5>
                    @else
                        <h5 class="h3 mb-0 text-dark">Traiter le dossier</h5>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.observations.update', $dossier->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="dossier_id" value="{{ $dossier->id }}" class="form-control">
                        <div class="pl-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="decision">Decision (*)</label>
                                @if ($dossier->status == 3 || $dossier->status == 4)
                                    <input type="text" class="form-control"
                                        value="{{ $dossier->status == 3 ? 'Dossier validé' : 'Dossier refusé' }}"
                                        readonly>
                                @else
                                    <select required name="decision" id="" class="form-control">
                                        <option value="">--</option>
                                        <option value="2" @if ($dossier->status == 2) selected @endif>Dossier en attente</option>
                                        <option value="3" @if ($dossier->status == 3) selected @endif>Dossier validé</option>
                                        <option value="4" @if ($dossier->status == 4) selected @endif>Dossier refusé</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <!-- Description -->
                        <div class="pl-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="observation"><b>Observation (*)</b></label> <br>
                                <textarea @if ($dossier->status == 3 || $dossier->status == 4) readonly @endif class="form-control" required name="content"
                                    id="observation" cols="30" no rows="10">@foreach ($dossier->observation as $observation)@if ($loop->last){!! $observation->content !!}@endif @endforeach
                                    </textarea>
                            </div>
                        </div>
                        <div class="pl-lg-12" @if ($dossier->status == 3 || $dossier->status == 4) hidden @endif>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primarys btn-block">Enregistrer la decision</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
