@extends('layouts.app', ['title' => 'Tableau de bord'])

@section('textOnHead')
    <!-- Card stats -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Dossiers Soumis</h5>
                            <span class="h2 font-weight-bold mb-0">
                                {{ count($dossier->where('status', 0)) }}
                            </span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-fodac-1 text-white rounded-circle shadow">
                                <i class="fa fa-folder"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{ count($dossier) }}</span>
                        <span class="text-nowrap">Soumis</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Dossiers en cours</h5>
                            <span class="h2 font-weight-bold mb-0">{{ count($dossier->where('status', 1)) }} </span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-fodac-1 text-white rounded-circle shadow">
                                <i class="ni ni-sound-wave"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
                            {{ (count($dossier->where('status', 1)) / count($dossier)) * 100 }}%</span>
                        <span class="text-nowrap">En Cours</span>
                        {{-- Depuis le mois dernier --}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Dossiers en attente</h5>
                            <span class="h2 font-weight-bold mb-0">{{ count($dossier->where('status', 2)) }} </span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-fodac-1 text-white rounded-circle shadow">
                                <i class="fa fa-exclamation-triangle"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
                            {{ (count($dossier->where('status', 2)) / count($dossier)) * 100 }}%</span>
                        <span class="text-nowrap">En Attentes</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Dossiers validés</h5>
                            <span class="h2 font-weight-bold mb-0">{{ count($dossier->where('status', 3)) }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-fodac-1 text-white rounded-circle shadow">
                                <i class="ni ni-check-bold"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
                            {{ (count($dossier->where('status', 3)) / count($dossier)) * 100 }}%</span>
                        <span class="text-nowrap">Validés</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-4">
            <!-- Members list group card -->
            <div class="card card-home">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Title -->
                    <h5 class="h3 mb-0">Vos derniers Dossiers</h5>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <!-- List group -->
                    <ul class="list-group list-group-flush list my--3">
                        @forelse($dossier->take(4)->reverse() as $index => $alldossier)
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a href="#" class="avatar rounded-circle">
                                            <img alt="Image placeholder" src="{{ asset('images/icon-dossier-3.png') }}">
                                        </a>
                                    </div>
                                    <div class="col ml--1">
                                        <h4 class="mb-0">
                                            <a href="#!">{{ $alldossier->name }}</a>
                                        </h4>
                                        <span class="text-success">●</span>
                                        <small>
                                            @if ($alldossier->status == 0)
                                                <i class="bg-warning"></i>
                                                <span class="status">
                                                    Pas en traitement
                                                </span>
                                            @elseif ($alldossier->status == 1)
                                                <i class="bg-warning"></i>
                                                <span class="status">
                                                    En cours de traitement
                                                </span>
                                            @elseif ($alldossier->status == 2)
                                                <i class="bg-warning"></i>
                                                <span class="status">
                                                    En attente de complement
                                                </span>
                                            @elseif ($alldossier->status == 3)
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
                                        </small>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ route('dossiers.show', $alldossier->id) }}"
                                            class="btn btn-sm btn-fodac-1">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @empty

                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    Vos n'avez de dossier soumis pour le moment
                                </div>
                            </li>

                        @endforelse

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <!-- Checklist -->
            <div class="card card-home">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Title -->
                    <h5 class="h3 mb-0">Vos derniers messages</h5>
                </div>
                <!-- Card body -->
                <div class="card-body p-0">
                    <!-- List group -->
                    <div class="list-group list-group-flush">
                        @forelse($supports->take(2)->reverse() as $index => $support)

                            <a href="#"
                                class="list-group-item list-group-item-action flex-column align-items-start py-4 px-4">
                                <div class="d-flex w-100 justify-content-between">
                                    <div>
                                        <div class="d-flex w-100 align-items-center">
                                            <img src="{{ asset('images/user.png') }}" alt="Image placeholder"
                                                class="avatar avatar-xs mr-2">
                                            <h5 class="mb-1">Admin</h5>
                                        </div>
                                    </div>
                                    <small>{{ $support->created_at->diffForHumans() }}</small>
                                </div>
                                <h4 class="mt-3 mb-1"> {{ $support->objet }}</h4>
                                <p class="text-sm mb-0">
                                    {{ Str::limit($support->message, 100, '...') }}
                                </p>
                            </a>


                        @empty
                            <a href="#"
                                class="list-group-item list-group-item-action flex-column align-items-start py-4 px-4">
                                <h4 class="mt-3 mb-1"> Pas de message</h4>
                            </a>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <!-- Progress track -->
            <div class="card card-home">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Title -->
                    <h5 class="h3 mb-0">Vos dernières notifications</h5>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                        @forelse($notifications->where('status', 0)->take(3)->reverse() as $index => $notification)
                            <div class="timeline-block">
                                @if ($notification->type == 'traitement')
                                    <span class="timeline-step badge-success">
                                        <i class="ni ni-bell-55"></i>
                                    </span>
                                @else
                                    <span class="timeline-step badge-danger">
                                        <i class="ni ni-email-83"></i>
                                    </span>
                                @endif

                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between pt-1">
                                        <div>
                                            <span
                                                class="text-muted text-sm font-weight-bold">{{ $notification->name }}</span>
                                        </div>
                                        <div class="text-right">
                                            <small class="text-muted"><i
                                                    class="fas fa-clock mr-1"></i>{{ $notification->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                    <h6 class="text-sm mt-1 mb-0">{{ Str::limit($notification->description, 35, '...') }}
                                    </h6>
                                </div>
                            </div>
                        @empty
                            <div class="timeline-block">
                                <p>Pas de nouvelle notification</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
