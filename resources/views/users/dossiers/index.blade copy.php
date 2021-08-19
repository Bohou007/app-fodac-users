@extends('layouts.app', ['title'=>'Consultations des dossiers'])

@section('content')
        <div class="row">
            <div class="col-md-12">

                <div class="car">
                    <div class="container">
                        <ul class="nav nav-tabs">
                            <li class="">
                                <a class="nav-link active" style="font-size:14px" data-toggle="tab" id="pills-home-tab"
                                    href="#home" role="tab" aria-controls="pills-home" aria-selected="true">
                                    Dossiers soumis
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" style="font-size:14px" data-toggle="tab" id="pills-home-tab"
                                    href="#menu1" role="tab" aria-controls="pills-home" aria-selected="true">
                                    Dossiers en cours de traitement
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" style="font-size:14px" data-toggle="tab" id="pills-home-tab"
                                    href="#menu2" role="tab" aria-controls="pills-home" aria-selected="true">
                                    Dossiers en attentes
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" style="font-size:14px" data-toggle="tab" id="pills-home-tab"
                                    href="#menu3" role="tab" aria-controls="pills-home" aria-selected="true">
                                    Dossiers validés
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" style="font-size:14px" data-toggle="tab" id="pills-home-tab"
                                    href="#menu4" role="tab" aria-controls="pills-home" aria-selected="true">
                                    Dossiers echoués
                                </a>
                            </li>

                        </ul>


                        <div class="tab-content col-md-12">
                            <div id="home" class="tab-pane active">

                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h4 class="mb-0">Consultation des dossiers deposer</h4>
                                    </div>
                                    <!-- Light table -->
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="name">Nom du projet</th>
                                                    <th scope="col" class="sort" data-sort="budget">Budget</th>
                                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @forelse ( $dossiers->where('status', 0) as $dossier )
                                                    @if ($dossier->status == 0)
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="media align-items-center">
                                                                    <a href="{{ route('dossiers.show', $dossier->id) }}"
                                                                        class="avatar rounded-circle mr-3">
                                                                        <img alt="Image placeholder"
                                                                            src="../../assets/img/theme/bootstrap.jpg">
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <span
                                                                            class="name mb-0 text-sm">{{ $dossier->name }}</span>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <td class="budget">
                                                                {{ $dossier->budget_oc }} FCFA
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-default">
                                                                    @if ($dossier->status == 0)
                                                                        <span class="status">
                                                                            Pas en traitement
                                                                        </span>
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td class="text-right">
                                                                <a class="btn btn-primarys btn-sm"
                                                                    href="{{ route('dossiers.show', $dossier->id) }}">
                                                                    <i class="fa fa-eye"></i>
                                                                    Voir le dossier
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @empty
                                                    <tr class="text-center">
                                                        <td colspan="6">
                                                            <h3>---- pas de nouveau dossier recu ----</h3>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Card footer -->
                                </div>

                            </div>

                            <!-- Bloc Dossiers en cours de traitement -->
                            <div id="menu1" class="tab-pane fade">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h4 class="mb-0">Consultation des dossiers en cours de traitement</h4>
                                    </div>
                                    <!-- Light table -->
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="name">Nom du projet</th>
                                                    <th scope="col" class="sort" data-sort="budget">Budget</th>
                                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @forelse ($dossiers->where('status', 1) as $dossier )
                                                    @if ($dossier->status == 1)
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="media align-items-center">
                                                                    <a href="{{ route('dossiers.show', $dossier->id) }}"
                                                                        class="avatar rounded-circle mr-3">
                                                                        <img alt="Image placeholder"
                                                                            src="../../assets/img/theme/bootstrap.jpg">
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <span
                                                                            class="name mb-0 text-sm">{{ $dossier->name }}</span>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <td class="budget">
                                                                {{ $dossier->budget_oc }} FCFA
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-primarys">
                                                                    @if ($dossier->status == 1)
                                                                        <span class="status">
                                                                            En cours de traitement
                                                                        </span>
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td class="text-right">
                                                                <a class="btn btn-primarys btn-sm"
                                                                    href="{{ route('dossiers.show', $dossier->id) }}">
                                                                    <i class="fa fa-eye"></i>
                                                                    Voir le dossier
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @empty
                                                    <tr class="text-center">
                                                        <td colspan="6">
                                                            <h3>---- Pas de dossier en cour de traitement ----</h3>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Card footer -->

                                </div>
                            </div>

                            <!-- Bloc Dosseirs en attentes -->
                            <div id="menu2" class="tab-pane fade">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h4 class="mb-0">Consultation des dossiers en attente de complement</h4>
                                    </div>
                                    <!-- Light table -->
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="name">Nom du projet</th>
                                                    <th scope="col" class="sort" data-sort="budget">Budget</th>
                                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @forelse ($dossiers->where('status', 2) as $dossier )
                                                    @if ($dossier->status == 2)
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="media align-items-center">
                                                                    <a href="{{ route('dossiers.show', $dossier->id) }}"
                                                                        class="avatar rounded-circle mr-3">
                                                                        <img alt="Image placeholder"
                                                                            src="../../assets/img/theme/bootstrap.jpg">
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <span
                                                                            class="name mb-0 text-sm">{{ $dossier->name }}</span>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <td class="budget">
                                                                {{ $dossier->budget_oc }} FCFA
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-warnings">
                                                                    @if ($dossier->status == 2)
                                                                        <i class="fa fa-exclamation-triangle "
                                                                            aria-hidden="true"></i>
                                                                        <span class="status">
                                                                            En attente de complement
                                                                        </span>
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td class="text-right">
                                                                <a class="btn btn-primarys btn-sm"
                                                                    href="{{ route('dossiers.show', $dossier->id) }}">
                                                                    <i class="fa fa-eye"></i>
                                                                    Voir le dossier
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @empty
                                                    <tr class="text-center">
                                                        <td colspan="6">
                                                            <h3>---- Pas de dossier en attente ----</h3>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Card footer -->

                                </div>
                            </div>

                            <!-- Bloc Dosseirs Validés -->
                            <div id="menu3" class="tab-pane fade">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h4 class="mb-0">Consultation des dossiers validés</h4>
                                    </div>
                                    <!-- Light table -->
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="name">Nom du projet</th>
                                                    <th scope="col" class="sort" data-sort="budget">Budget</th>
                                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @forelse ($dossiers->where('status', 3) as $dossier )
                                                    {{-- @if ($dossier->status == 3) --}}
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="media align-items-center">
                                                                    <a href="{{ route('dossiers.show', $dossier->id) }}"
                                                                        class="avatar rounded-circle mr-3">
                                                                        <img alt="Image placeholder"
                                                                            src="../../assets/img/theme/bootstrap.jpg">
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <span
                                                                            class="name mb-0 text-sm">{{ $dossier->name }}</span>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <td class="budget">
                                                                {{ $dossier->budget_oc }} FCFA
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-successe">
                                                                    @if ($dossier->status == 3)
                                                                        <span class="status">
                                                                            Dossier validé
                                                                        </span>
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td class="text-right">
                                                                <a class="btn btn-primarys btn-sm"
                                                                    href="{{ route('dossiers.show', $dossier->id) }}">
                                                                    <i class="fa fa-eye"></i>
                                                                    Voir le dossier
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    {{-- @endif --}}
                                                @empty
                                                    <tr class="text-center">
                                                        <td colspan="6">
                                                            <h3>---- Pas de dossier validé ----</h3>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Card footer -->

                                </div>
                            </div>

                            <!-- Bloc Dosseirs echoué -->
                            <div id="menu4" class="tab-pane fade">
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header border-0">
                                        <h4 class="mb-0">Consultation des dossiers echoués</h4>
                                    </div>
                                    <!-- Light table -->
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="name">Nom du projet</th>
                                                    <th scope="col" class="sort" data-sort="budget">Budget</th>
                                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @forelse ($dossiers->where('status', 4) as $dossier )
                                                    @if ($dossier->status == 4)
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="media align-items-center">
                                                                    <a href="{{ route('dossiers.show', $dossier->id) }}"
                                                                        class="avatar rounded-circle mr-3">
                                                                        <img alt="Image placeholder"
                                                                            src="../../assets/img/theme/bootstrap.jpg">
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <span class="name mb-0 text-sm">
                                                                            {{ $dossier->name }}</span>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <td class="budget">
                                                                {{ $dossier->budget_oc }} FCFA
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-dangers">
                                                                    @if ($dossier->status == 4)
                                                                        <span class="status">
                                                                            Dossier échoué
                                                                        </span>
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td class="text-right">
                                                                <a class="btn btn-primarys btn-sm"
                                                                    href="{{ route('dossiers.show', $dossier->id) }}">
                                                                    <i class="fa fa-eye"></i>
                                                                    Voir le dossier
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @empty
                                                    <tr class="text-center">
                                                        <td colspan="6">
                                                            <h3>---- Pas de dossier echoué ----</h3>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Card footer -->

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
