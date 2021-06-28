@extends('layouts.app', ['title'=>'Consultations des dossiers'])

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h2 class="mb-0">Consultation des dossiers deposer</h2>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Nom du projet</th>
                                <th scope="col" class="sort" data-sort="budget">Budget</th>
                                <th scope="col" class="sort" data-sort="status">Status</th>
                                <th scope="col" class="sort" data-sort="completion">Completion</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($dossiers as $dossier)
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <a href="{{ route('dossiers.show', $dossier->id) }}" class="avatar rounded-circle mr-3">
                                                <img alt="Image placeholder" src="../../assets/img/theme/bootstrap.jpg">
                                            </a>
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{ $dossier->name }}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="budget">
                                        {{ $dossier->budget_oc }} FCFA
                                    </td>
                                    <td>
                                        <span class="badge badge-dot mr-4">

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
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="completion mr-2">60%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('dossiers.show', $dossier->id) }}">Voir le dossier</a>
                                            @if ($dossier->status == 3)
                                                <a class="dropdown-item" href="#">Planning de financement</a>
                                            @endif
                                                <a class="dropdown-item" href="#">Ajouter un complement(Document)</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->

            </div>
        </div>
    </div>
@endsection
