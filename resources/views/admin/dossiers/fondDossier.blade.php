@extends('layouts.appAdn')


@section('textOnHead')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="car">
                <div class="d">
                    <ul class="nav nav-tabs nav-fill nav-justified">

                        <li class="nav-item">
                            <a class="nav-link active" style="font-size:1em" data-toggle="tab" id="pills-home-tab"
                                href="#home" role="tab" aria-controls="pills-home" aria-selected="true">
                                Dossiers à approuver
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-size:1em" data-toggle="tab" id="pills-home-tab" href="#menu1"
                                role="tab" aria-controls="pills-home" aria-selected="true">
                                Dossiers approuver
                            </a>
                        </li>

                    </ul>


                    <div class="tab-content">
                        <div id="home" class="tab-pane active">

                            <div class="cards">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h4 class="mb-0">Consultation des dossiers à approuver</h4>
                                </div>
                                <!-- Light table -->
                                <div class="table-responsive py-4">
                                    <table class="table table-flush" id="datatable-buttons">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nom & prénoms</th>
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
                                                <th scope="col">Nom & prénoms</th>
                                                <th scope="col">Nom du projet</th>
                                                <th scope="col">Budget</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Date de creation</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @forelse ($dossiers->whereNull('fond_fodac')->whereNull('approuve')->where('status', 3) as $index => $dossier)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $dossier->user->last_name }}
                                                        {{ $dossier->user->first_name }}
                                                    </td>
                                                    <td>{{ $dossier->name }}</td>
                                                    <td>{{ $dossier->budget_oc }} FCFA</td>
                                                    <td>
                                                        <span class="badge badge-default">
                                                            @if ($dossier->status == 3 && $dossier->approuve == null)
                                                                <span class="status">
                                                                    Pas approuver
                                                                </span>
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td>{{ $dossier->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('assigned-fond.show', $dossier->id) }}"
                                                            class="btn btn-fodac-1 btn-sm">
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                        <a href="" class="btn btn-fodac-2 btn-sm">
                                                            <i class="fa fa-share"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center">
                                                    <td colspan="6">
                                                        <h3>---- pas de nouveau dossier approuver----</h3>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Card footer -->
                            </div>

                        </div>
                        <!-- Bloc Dossiers Dossiers approuver -->
                        <div id="menu1" class="tab-pane">

                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h4 class="mb-0">Consultation des dossiers approuver</h4>
                                </div>
                                <!-- Light table -->
                                <div class="table-responsive py-4">
                                    <table class="table table-flush" id="datatable-buttons">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nom & prénoms</th>
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
                                                <th scope="col">Nom & prénoms</th>
                                                <th scope="col">Nom du projet</th>
                                                <th scope="col">Budget</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Date de creation</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @forelse ($dossiers->whereNotNull('fond_fodac')->where('approuve', 1)->where('status', 3) as $dossier)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $dossier->user->last_name }}
                                                        {{ $dossier->user->first_name }}
                                                    </td>
                                                    <td>{{ $dossier->name }}</td>
                                                    <td>{{ $dossier->budget_oc }} FCFA</td>
                                                    <td>
                                                        <span class="badge badge-default">
                                                            @if ($dossier->status == 3 && $dossier->approuve == 1)
                                                                <span class="status">
                                                                    Pas approuver
                                                                </span>
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td>{{ $dossier->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('assigned-fond.show', $dossier->id) }}"
                                                            class="btn btn-fodac-1 btn-sm">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        {{-- <a href="" class="btn btn-dangers btn-sm">
                                                        <i class="fa fa-share"></i>
                                                    </a> --}}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center">
                                                    <td colspan="6">
                                                        <h3>---- pas de nouveau dossier approuver----</h3>
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
