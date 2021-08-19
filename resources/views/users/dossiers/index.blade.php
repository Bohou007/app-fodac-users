@extends('layouts.app', ['title' => 'Consultations des dossiers'])

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


                    <div class="tab-content col-md-12">
                        <div id="home" class="tab-pane active">

                            <div class="mt-3">
                                <a href="{{ route('dossiers.create') }}" class="btn pull-right btn-fodac-1">
                                    <i class="fa fa-plus"></i>
                                    <span>
                                        Ajouter un nouveau dossier
                                    </span>
                                </a>
                            </div>
                            <div class="table-responsive py-4">
                                <table class="table table-flush" id="">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom du projet</th>
                                            <th scope="col">Budget</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date de creation</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom du projet</th>
                                            <th scope="col">Budget</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date de creation</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse ( $dossiers->where('status', 0)->reverse() as $index => $dossier )
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $dossier->name }}</td>
                                                <td>{{ $dossier->budget_oc }} FCFA</td>
                                                <td>
                                                    <span class="badge badge-default">
                                                        @if ($dossier->status == 0)
                                                            <span class="status">
                                                                Pas en traitement
                                                            </span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>{{ $dossier->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('dossiers.show', $dossier->id) }}" class="btn btn-fodac-1 btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="" class="btn btn-dangers btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty

                                            <tr class="text-center">
                                                <td colspan="6">
                                                    <h3>---- pas de nouveau dossier ----</h3>
                                                </td>
                                            </tr>

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>


                        </div>

                        <!-- Bloc Dossiers en cours de traitement -->
                        <div id="menu1" class="tab-pane fade">

                            <div class="table-responsive py-4">
                                <table class="table table-flush" id="">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom du projet</th>
                                            <th scope="col">Budget</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date de creation</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom du projet</th>
                                            <th scope="col">Budget</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date de creation</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse ( $dossiers->where('status', 1)->reverse() as $index => $dossier )
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $dossier->name }}</td>
                                                <td>{{ $dossier->budget_oc }} FCFA</td>
                                                <td>
                                                    <span class="badge badge-primarys">
                                                        @if ($dossier->status == 1)
                                                            <span class="status">
                                                                En cours de traitement
                                                            </span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>{{ $dossier->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('dossiers.show', $dossier->id) }}" class="btn btn-fodac-1 btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                        @empty

                                            <tr class="text-center">
                                                <td colspan="6">
                                                    <h3>---- pas de nouveau dossier ----</h3>
                                                </td>
                                            </tr>

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Bloc Dosseirs en attentes -->
                        <div id="menu2" class="tab-pane fade">
                            <div class="table-responsive py-4">
                                <table class="table table-flush" id="">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom du projet</th>
                                            <th scope="col">Budget</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date de creation</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom du projet</th>
                                            <th scope="col">Budget</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date de creation</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse ( $dossiers->where('status', 2)->reverse() as $index => $dossier )
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $dossier->name }}</td>
                                                <td>{{ $dossier->budget_oc }} FCFA</td>
                                                <td>
                                                    <span class="badge badge-warnings">
                                                        @if ($dossier->status == 2)
                                                            <i class="fa fa-exclamation-triangle " aria-hidden="true"></i>
                                                            <span class="status">
                                                                En attente de complement
                                                            </span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>{{ $dossier->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('dossiers.show', $dossier->id) }}" class="btn btn-fodac-1 btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('document-complementaires.create') }}" class="btn btn-fodac-2 btn-sm">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                        @empty

                         d                   <tr class="text-center">
                                                <td colspan="6">
                                                    <h3>----  Pas de dossier en attente  ----</h3>
                                                </td>
                                            </tr>

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Bloc Dosseirs Validés -->
                        <div id="menu3" class="tab-pane fade">
                            <div class="table-responsive py-4">
                                <table class="table table-flush" id="">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom du projet</th>
                                            <th scope="col">Budget</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date de creation</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom du projet</th>
                                            <th scope="col">Budget</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date de creation</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse ( $dossiers->where('status', 3)->reverse() as $index => $dossier )
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $dossier->name }}</td>
                                                <td>{{ $dossier->budget_oc }} FCFA</td>
                                                <td>
                                                    <span class="badge badge-successe">
                                                        @if ($dossier->status == 3)
                                                            <span class="status">
                                                                Dossier validé
                                                            </span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>{{ $dossier->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('dossiers.show', $dossier->id) }}" class="btn btn-fodac-1 btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>

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
                        </div>

                        <!-- Bloc Dosseirs echoué -->
                        <div id="menu4" class="tab-pane fade">
                            <div class="table-responsive py-4">
                                <table class="table table-flush" id="">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom du projet</th>
                                            <th scope="col">Budget</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date de creation</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom du projet</th>
                                            <th scope="col">Budget</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date de creation</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse ( $dossiers->where('status', 4)->reverse() as $index => $dossier )
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $dossier->name }}</td>
                                                <td>{{ $dossier->budget_oc }} FCFA</td>
                                                <td>
                                                    <span class="badge badge-dangers">
                                                        @if ($dossier->status == 4)
                                                            <span class="status">
                                                                Dossier échoué
                                                            </span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>{{ $dossier->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('dossiers.show', $dossier->id) }}" class="btn btn-fodac-1 btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>

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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
