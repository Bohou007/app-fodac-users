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
                                            <span class="badge @if($user->account_type == 'ADMIN') badge-primarys  @elseif ($user->account_type == 'STAFF') badge-infos @elseif ($user->account_type == 'CONSULTANT') badge-warnings @else badge-successe @endif ">
                                                {{ $user->account_type }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('compte.users.edit', $user) }}" class="btn btn-primarys btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-dangers btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </a>
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
