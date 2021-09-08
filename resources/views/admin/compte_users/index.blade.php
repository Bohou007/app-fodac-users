@extends('layouts.appAdn', ['title' => 'Tous les utilisateurs'])


@section('textOnHead')

@endsection

@section('content')
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card">


                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <div class="block">
                            <div class="block-left">
                                <h3 class="mb-0">Comptes Utilisateurs</h3>
                                <p class="text-sm mb-0">
                                    Tous les comptes utilisateurs de l'application Fodac.
                                </p>
                            </div>
                            <div class="block-rght">
                                <a href="{{ route('admin.register') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    <span>
                                        Ajouter un nouvel utilisateur
                                    </span>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenoms</th>
                                    <th>Adresse Mail</th>
                                    <th>Tel</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenoms</th>
                                    <th>Adresse Mail</th>
                                    <th>Tel</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->contact }}</td>
                                        <td>
                                            <span class="badge @if ($user->account_type == 'ADMIN') badge-primarys  @elseif ($user->account_type == 'STAFF') badge-infos @elseif ($user->account_type == 'CONSULTANT') badge-warnings @else badge-successe @endif ">
                                                {{ $user->account_type }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('compte.users.edit', $user) }}"
                                                class="btn btn-primarys btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-dangers btn-sm" data-toggle="modal"
                                            data-target="#modal-delete-{{ $user->id }}">
                                                <i class="fa fa-trash"></i>

                                            </a>

                                            {{-- Fenetre Modal (--- Delete ---)  #debut --}}

                                            <div class="modal fade" id="modal-delete-{{ $user->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                Suppression d'utilisateur</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body ">
                                                            Confirmez-vous la suppression de l'utilisateur
                                                            <strong>{{ $user->last_name }} {{ $user->first_name }}</strong>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('compte.users.delete', $user->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="button" class="btn btn-fodac-1"
                                                                    data-dismiss="modal">Annuler</button>
                                                                <button type="submit" id="supprimer" class="btn btn-dangers">Supprimer l'utilisateur</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Fenetre Modal  #fin --}}
                                        </td>
                                    </tr>
                                @empty

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
