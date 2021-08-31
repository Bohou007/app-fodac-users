@extends('layouts.appAdn', ['title'=>'Consultations des dossiers'])

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="car">
                <div class="d">
                    <ul class="nav nav-tabs mb-4 nav-fill nav-justified">

                        <li class="nav-item">
                            <a class="nav-link active" style="font-size:1em" data-toggle="tab" id="pills-home-tab"
                                href="#home" role="tab" aria-controls="pills-home" aria-selected="true">
                                Details du dossier
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-size:1em" data-toggle="tab" id="pills-home-tab" href="#menu1"
                                role="tab" aria-controls="pills-home" aria-selected="true">
                                Approbation du dossier
                            </a>
                        </li>

                    </ul>


                    <div class="tab-content">
                        <div id="home" class="tab-pane active">
                            <div class="row ">
                                <div class="col-xl-4 order-xl-2">
                                    <div class="card"
                                        style="background-color: #3454a1 !important; color: #ffffff !important;">
                                        <!-- Card header -->
                                        <div class="card-header"
                                            style="background-color: #3454a1 !important; color: #ffffff !important;">
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
                                                                <a href="{{ asset('documents/' . $pj->path_doc) }}"
                                                                    target="_blank" class="avatar rounded-circle mr-3">
                                                                    <img alt="Image placeholder"
                                                                        src="{{ asset('images/pdf-image.png') }}">
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
                                                            <h5 class="card-title text-uppercase text-muted mb-0 text-dark">
                                                                Nom
                                                                Projet
                                                            </h5>
                                                            <span
                                                                class="h2 font-weight-bold mb-0 text-dark">{{ $dossier->name }}</span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div
                                                                class="icon icon-shape bg-white text-dark rounded-circle shadow">
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
                                                            <h5 class="card-title text-uppercase text-muted mb-0 text-dark">
                                                                Budget du
                                                                projet</h5>
                                                            <span
                                                                class="h2 font-weight-bold mb-0 text-dark">{{ $dossier->budget_oc }}</span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div
                                                                class="icon icon-shape bg-white text-dark rounded-circle shadow">
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
                                                                <label class="form-control-label" for="input-username">
                                                                    <b>Capitale</b></label> <br>
                                                                {{ $dossier->capitale_oc }}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-control-label"
                                                                    for="input-email"><b>Capitale
                                                                        en fin
                                                                        d'activité</b></label><br>
                                                                {{ $dossier->capitale_demander }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Description -->
                                                <div class="pl-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label"><b>Description du
                                                                projet</b></label>
                                                        <br>
                                                        {!! $dossier->description !!}
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @if ($dossier->status != 0 || $dossier->status != 1)
                                        <div class="card">
                                            <div class="card-header">
                                                <!-- Title -->
                                                <h5 class="h3 mb-0 text-dark">Resultat de la decision final</h5>
                                            </div>
                                            <div class="card-body">
                                                <form action="#" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="dossier_id" value="{{ $dossier->id }}"
                                                        class="form-control">
                                                    <div class="pl-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="decision">Decision
                                                                (*)</label>
                                                            <input type="text" class="form-control" value=" @if ($dossier->status == 3) Dossier validé @elseif($dossier->status == 2) Dossier en attente de
                                                        complement @elseif($dossier->status == 4) Dossier refusé
                                                        @else Dossier en cour de traitement @endif "
                                                            readonly>
                                                        </div>
                                                    </div>
                                                    <!-- Description -->
                                                    <div class="pl-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label"
                                                                for="observation"><b>Observation (*)</b></label> <br>
                                                            <textarea readonly class="form-control" required name="content"
                                                                id="observation"
                                                                rows="auto">@forelse ($dossier->observation as $observation)@if ($loop->last){!! $observation->content !!}@endif @empty Dossier en cour de traitement @endforelse</textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Bloc Dossiers Dossiers approuver -->
                        <div id="menu1" class="tab-pane">

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <!-- Title -->
                                            <h5 class="h3 mb-0 text-dark">Approbation du dossier</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('assigned-fond.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="dossier_id" value="{{ $dossier->id }}"
                                                    class="form-control">
                                                <div class="pl-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="approuve">Decision
                                                            (*)</label>
                                                        <select required name="approuve" id="approuve"
                                                            class="form-control @error('approuve') is-invalid @enderror">
                                                            <option value="">--</option>
                                                            <option value="1">Approuvé</option>
                                                            <option value="0">Non Approuvé</option>
                                                        </select>
                                                        @error('approuve')
                                                            <span class="invalid-feedback text-left" role="alert">
                                                                <strong>{!! $message !!}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="pl-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="fond_dossier"><b>Assignation
                                                                du fond dossier (*)</b></label> <br>
                                                        <div class="input-group">
                                                            <input type="number" name="fond_dossier" class="form-control @error('fond_dossier') is-invalid @enderror" value="{{ old('fond_dossier') }}"
                                                                id="fond_dossier"  placeholder="Fond du dossier..." aria-label="Fond du dossier..."
                                                                aria-describedby="inputGroupPrepend2" required="">
                                                            @error('fond_dossier')
                                                                <span class="invalid-feedback text-left" role="alert">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                    style="background-color: #3454a1 !important; color: #ffffff !important;"
                                                                    id="inputGroupPrepend2">FCFA</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Description -->
                                                <div class="pl-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="observation"><b>Observation
                                                                (*)</b></label> <br>
                                                        <textarea
                                                            class="form-control @error('content') is-invalid @enderror"
                                                            required name="description" id="observation" cols="30"
                                                            rows="10"></textarea>
                                                        @error('content')
                                                            <span class="invalid-feedback text-left" role="alert">
                                                                <strong>{!! $message !!}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="pl-lg-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primarys btn-block">Enregistrer
                                                            la decision</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
