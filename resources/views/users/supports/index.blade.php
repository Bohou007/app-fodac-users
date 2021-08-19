@extends('layouts.app', ['title' => 'Contactez le supports'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-wrapper">
                <!-- Default browser form validation -->
                <div class="card row">
                    <div class="col-md-12">
                        <div class="container">

                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0"> Listes des messages </h3>
                            </div>

                            {{-- Fenetre Modal  #debut --}}

                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Laissez-nous un message
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('supports.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-1">
                                                        <div class="form-group">
                                                            <label class="form-control-label"
                                                                for="validationDefaultUsername">Objet
                                                                (*)</label>
                                                            <input value="" name="objet" type="text"
                                                                value="{{ old('objet') }}"
                                                                class="form-control @error('objet') is-invalid @enderror"
                                                                id="validationDefaultUsername"
                                                                placeholder="Entrez l'objet de votre message"
                                                                aria-describedby="inputGroupPrepend2" required="">
                                                            @error('objet')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-1">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="message">Message
                                                                (*)</label>
                                                            <textarea name="message" value="{{ old('message') }}"
                                                                class="form-control @error('message') is-invalid @enderror"
                                                                id="message" cols="30" rows="5"
                                                                placeholder="Entrez le contenue de votre message"></textarea>
                                                            @error('message')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-dangers"
                                                        data-dismiss="modal">Annuler</button>
                                                    <button class="btn btn-fodac-1" type="submit">Envoyer votre
                                                        message</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            {{-- Fenetre Modal  #fin --}}

                            <!-- Card body -->
                            <div class="card-body">
                                <div class="mb-5">
                                    <a href="" class="btn pull-right btn-fodac-1" data-toggle="modal"
                                        data-target="#exampleModalCenter">
                                        <i class="fa fa-mobile"></i>
                                        <span>
                                            Contactez le support
                                        </span>
                                    </a>
                                </div>
                                <div class="table-responsive py-4">
                                    <table class="table table-flush" id="">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Objets</th>
                                                <th scope="col">Messages</th>
                                                <th scope="col">Reponses</th>
                                                <th scope="col">Date d'envoie</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Objets</th>
                                                <th scope="col">Messages</th>
                                                <th scope="col">Reponses</th>
                                                <th scope="col">Date d'envoie</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @forelse ($supports as $index => $support)
                                                <tr>
                                                    <th scope="row">{{ $index + 1 }}</th>
                                                    <td>{{ $support->objet }}</td>
                                                    <td>{{ Str::limit($support->message, 30, '...') }}</td>
                                                    <td>{{ $support->reponse ? Str::limit($support->reponse, 20, '...') : ' Pas de reponse ' }}
                                                    </td>
                                                    <td>{{ $support->created_at }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-fodac-1 btn-sm" data-toggle="modal"
                                                            data-target="#modal-show-{{ $support->id }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="" class="btn btn-dangers btn-sm" data-toggle="modal"
                                                            data-target="#modal-delete-{{ $support->id }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>

                                                        {{-- Fenetre Modal (--- Delete ---)  #debut --}}

                                                        <div class="modal fade" id="modal-delete-{{ $support->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Suppression du message</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    Etes-vous sûr de vouloir supprimer ce message ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('supports.delete', $support->id) }}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="button" class="btn btn-fodac-1" data-dismiss="modal">Annuler</button>
                                                                        <button type="submit" class="btn btn-dangers">Supprimer le message</button>
                                                                    </form>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>

                                                        {{-- Fenetre Modal  #fin --}}
                                                    </td>
                                                </tr>

                                                {{-- Fenetre Modal  (--- View data ---)  #debut --}}

                                                <div class="modal fade" id="modal-show-{{ $support->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Message Support
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-row">
                                                                    <div class="col-md-12 mb-1">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label"
                                                                                for="validationDefaultUsername">Objet
                                                                                </label>
                                                                            <input readonly name="objet" type="text" value="{{ $support->objet }}"  class="form-control ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-md-12 mb-1">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label" for="message">Message
                                                                                </label>
                                                                            <textarea readonly name="message" rows="5"
                                                                            class="form-control">{{ $support->message }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-md-12 mb-1">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label" for="message">Reponse
                                                                                </label>
                                                                            <textarea readonly name="message"
                                                                            class="form-control">{{ $support->reponse ? $support->reponse : ' Pas de reponse à ce message pour le moment' }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-dangers"
                                                                        data-dismiss="modal">Fermer</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                                {{-- Fenetre Modal  #fin --}}
                                            @empty

                                                <tr>
                                                    <center>
                                                        -- Pas de messages --
                                                    </center>
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
    </div>

@endsection
