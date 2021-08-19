@extends('layouts.appAdn')


@section('textOnHead')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="d">
                    <ul class="nav nav-tabs nav-fill nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" style="font-size:14px" data-toggle="tab" id="pills-home-tab"
                                href="#home" role="tab" aria-controls="pills-home" aria-selected="true">
                                Dossiers soumis
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-size:14px" data-toggle="tab" id="pills-home-tab" href="#menu1"
                                role="tab" aria-controls="pills-home" aria-selected="true">
                                Dossiers en cours
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-size:14px" data-toggle="tab" id="pills-home-tab" href="#menu2"
                                role="tab" aria-controls="pills-home" aria-selected="true">
                                Dossiers en attentes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-size:14px" data-toggle="tab" id="pills-home-tab" href="#menu3"
                                role="tab" aria-controls="pills-home" aria-selected="true">
                                Dossiers validés
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-size:14px" data-toggle="tab" id="pills-home-tab" href="#menu4"
                                role="tab" aria-controls="pills-home" aria-selected="true">
                                Dossiers echoués
                            </a>
                        </li>

                    </ul>



                    <div class="tab-content">
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
                                                <th scope="col" class="sort" data-sort="name">Nom & Prenom</th>
                                                <th scope=          bv"col" class="sort" data-sort="name">Nom du projet
                                                </th>
                                                <th scope="col" class="sort" data-sort="budget">budget</th>
                                                <th scope="col" class="sort" data-sort="status">Status</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($dossiers->where('status', 0) as $index => $dossier)
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
                                                                    <span class="name mb-0 text-sm">
                                                                        {{ $dossier->user->last_name }}
                                                                        {{ $dossier->user->first_name }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </th>
                                                        <td class="budget">
                                                            {{ $dossier->name }}
                                                        </td>
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
                                                            <div class="dropdown">
                                                                <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                                    role="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </a>
                                                                <div
                                                                    class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.traiteDossieerUpdate', $dossier->id) }}">Traiter
                                                                        le
                                                                        dossier</a>
                                                                    <a class="dropdown-item" href="#">Assigner le
                                                                        dossier</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    {{-- Fenetre Modal  #debut --}}

                                                    <div class="modal fade" id="modal-notification" tabindex="-1"
                                                        role="dialog" aria-labelledby="modal-notification"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                            role="document">
                                                            <div class="modal-content bg-gradient-dangers">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title" id="modal-title-notification">
                                                                        Votre attention est nécessaire</h6>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="py-3 text-center">
                                                                        <i class="ni ni-bell-55 ni-3x"></i>
                                                                        <h4 class="heading mt-4">Vous devriez lire ça !
                                                                        </h4>
                                                                        <p>
                                                                            Vous vous appraitez à traiter se dossier.
                                                                            Etes-vous vraiment
                                                                            sure de vouloir le faire ?
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form
                                                                        action="{{ route('admin.traiteDossieerUpdate', $dossier->id) }}"
                                                                        method="get">
                                                                        @csrf

                                                                        <button type="submit" class="btn btn-primarys">
                                                                            Oui, Je veux traiter se dossier
                                                                        </button>
                                                                    </form>
                                                                    <button type="button"
                                                                        class="btn btn-link text-danger ml-auto"
                                                                        data-dismiss="modal">Non, merci !</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Fenetre Modal  #fin --}}

                                                @else
                                                    <tr class="text-center">
                                                        <td colspan="6">
                                                            <h3>---- pas de nouveau dossier recu ----</h3>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
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
                                                <th scope="col" class="sort" data-sort="name">Nom & Prenom</th>
                                                <th scope="col" class="sort" data-sort="name">Nom du projet</th>
                                                <th scope="col" class="sort" data-sort="budget">budget</th>
                                                <th scope="col" class="sort" data-sort="status">Status</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($dossiers->where('status', 1) as $index => $dossier)
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
                                                                    <span class="name mb-0 text-sm">
                                                                        {{-- @dump($dossier->user()) --}}
                                                                        {{ $dossier->user->last_name }}
                                                                        {{ $dossier->user->first_name }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </th>
                                                        <td class="budget">
                                                            {{ $dossier->name }}
                                                        </td>
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
                                                            <div class="dropdown">
                                                                <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                                    role="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </a>
                                                                <div
                                                                    class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.DossierShow', $dossier->id) }}">
                                                                        Voir le dossier
                                                                    </a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.addComplementDoc', $dossier->id) }}">Ajouter
                                                                        un
                                                                        complement(Document)</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr class="text-center">
                                                        <td colspan="6">
                                                            <h3>---- Pas de dossier en cour de traitement ----</h3>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
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
                                                <th scope="col" class="sort" data-sort="name">Nom & Prenom</th>
                                                <th scope="col" class="sort" data-sort="name">Nom du projet</th>
                                                <th scope="col" class="sort" data-sort="budget">budget</th>
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
                                                                    <span class="name mb-0 text-sm">
                                                                        {{ $dossier->user->last_name }}
                                                                        {{ $dossier->user->first_name }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </th>
                                                        <td class="budget">
                                                            {{ $dossier->name }}
                                                        </td>
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
                                                            <div class="dropdown">
                                                                <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                                    role="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </a>
                                                                <div
                                                                    class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.DossierShow', $dossier->id) }}">Voir
                                                                        le dossier
                                                                    </a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.addComplementDoc', $dossier->id) }}">Ajouter
                                                                        un
                                                                        complement(Document)
                                                                    </a>
                                                                </div>
                                                            </div>
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
                                                <th scope="col" class="sort" data-sort="name">Nom & Prenom</th>
                                                <th scope="col" class="sort" data-sort="name">Nom du projet</th>
                                                <th scope="col" class="sort" data-sort="budget">budget</th>
                                                <th scope="col" class="sort" data-sort="status">Status</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @forelse ($dossiers->where('status', 3) as $dossier )
                                                @if ($dossier->status == 3)
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
                                                                        {{ $dossier->user->last_name }}
                                                                        {{ $dossier->user->first_name }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </th>
                                                        <td class="budget">
                                                            {{ $dossier->name }}
                                                        </td>
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
                                                            <div class="dropdown">
                                                                <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                                    role="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </a>
                                                                <div
                                                                    class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.DossierShow', $dossier->id) }}">
                                                                        Voir le dossier
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
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
                                                <th scope="col" class="sort" data-sort="name">Nom & Prenom</th>
                                                <th scope="col" class="sort" data-sort="name">Nom du projet</th>
                                                <th scope="col" class="sort" data-sort="budget">budget</th>
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
                                                                        {{ $dossier->user->last_name }}
                                                                        {{ $dossier->user->first_name }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </th>
                                                        <td class="budget">
                                                            {{ $dossier->name }}
                                                        </td>
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
                                                            <div class="dropdown">
                                                                <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                                    role="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </a>
                                                                <div
                                                                    class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.DossierShow', $dossier->id) }}">
                                                                        Voir le dossier
                                                                    </a>
                                                                    <a class="dropdown-item" href="#">Retraiter le
                                                                        dossier</a>
                                                                </div>
                                                            </div>
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
