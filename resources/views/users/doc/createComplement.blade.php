@extends('layouts.app', ['title'=>'Document complementaire'])

@section('content')
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card-wrapper">
                <!-- Default browser form validation -->
                <div class="card">
                    <div class="container">

                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Enregistrer votre document</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">

                            <form action="{{ route('document-complementaires.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div>
                                    @if (!$dossiers->count())
                                        <div class="alert alert-fodac alert-dismissible fade show" role="alert">
                                            <span class="alert-icon"><i class="ni bell-55"></i></span>
                                            <span class="alert-text"><strong>Aucun Projet enregister!</strong> Vous n'avez
                                                pas
                                                de projet pre-enregistrer</span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    @else
                                        <div class="form-row">
                                            <label for="">Selectionnez votre documents</label>
                                            <select class="form-control" name="dossier_id" @error('dossier_id') is-invalid
                                                @enderror>
                                                <option value="">Choisissez le fichiers a charger</option>
                                                @foreach ($dossiers as $dossier)
                                                    <option value="{{ $dossier->id }}">{{ $dossier->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('dossier_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endif
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <label class="form-control-label" for="validationDefaultUsername">Nom du
                                                document</label>
                                            <div class="input-group">
                                                <input value="{{ old('doc_name') }}" name="doc_name" type="text"
                                                    class="form-control @error('doc_name') is-invalid @enderror"
                                                    id="validationDefaultUsername"
                                                    placeholder="Entrez le nom de votre document"
                                                    aria-describedby="inputGroupPrepend2" required="">
                                                @error('doc_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{!! $message !!}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <label class="form-control-label" for="validationDefault03">Charger votre
                                                fichier (Format valid Pdf, xdoc..)</label>
                                            <input name="doc_file" value="{{ old('doc_file') }}" type="file"
                                                class="form-control @error('doc_file') is-invalid @enderror"
                                                id="validationDefault03" required="">
                                            @error('doc_file')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-fodac-2" type="submit">Enregistrer</button>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
