@extends('layouts.app', ['title'=>'Demande de soutien'])

@section('styleCss')
    <link rel="stylesheet"
        href="{{ asset('steps_form/fonts/material-design-iconic-font/css/material-design-iconic-font.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('assets/vendor/quill/dist/quill.core.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('assets/vendor/dropzone/dist/min/basic.min.css') }}" defer>

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('steps_form/css/style.css') }}" defer>
@endsection

@section('content')
    <div class="rosw">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <h3 class="mb-0">Information de l'utilisateur </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body row">

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for=""> Nom du projet *</label>
                                            <input required type="text" value="{{ old('name_project') }}"
                                                name="name_project"
                                                class="form-control name @error('doc_name') is-invalid @enderror"
                                                placeholder="Entrer le nom du projet">
                                            @error('name_project')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for=""> Budget du projet</label>
                                            <input required type="text" name="budget_oc"
                                                class="form-control budget_oc @error('budget_oc') is-invalid @enderror"
                                                value="{{ old('budget_oc') }}"
                                                placeholder="Entrez le budget pour la realisation du projet.">
                                            @error('budget_oc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for=""> Votre Capitale</label>
                                            <input required type="text" name="capitale_oc"
                                                class="form-control  @error('capitale_oc') is-invalid @enderror"
                                                value="{{ old('capitale_oc') }}"
                                                placeholder="Quels votre fond pour la realisation du projet.">
                                            @error('capitale_oc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for=""> Capitale Demander</label>
                                            <input required type="text" name="capitale_demander"
                                                class="form-control @error('capitale_demander') is-invalid @enderror"
                                                value="{{ old('capitale_demander') }}"
                                                placeholder="Entrez le montant demander">
                                            @error('capitale_demander')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="form-group">
                                            <div class="card-wrapzper">
                                                <div>
                                                    @if (!$dossiers->count())
                                                        <div class="alert alert-fodac alert-dismissible fade show"
                                                            role="alert">
                                                            <span class="alert-icon"><i class="ni bell-55"></i></span>
                                                            <span class="alert-text"><strong>Aucun document
                                                                    enregister!</strong> Vous n'avez pas
                                                                de document pre-enregistrer merci de charger vos
                                                                fichiers</span>
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                    @else
                                                        @foreach ($dossiers as $dossier)
                                                            <div class="form-row">
                                                                <div class="form-controcl text-left" style="">
                                                                    <label for="doc-{{ $dossier->id }}">
                                                                        <input type="checkbox" value="{{ $dossier->id }}"
                                                                            name="pj_id[]" id="doc-{{ $dossier->id }}"
                                                                            class="form-controls  @error('pj_id') is-invalid @enderror">
                                                                        <span class="ml-3" style="color: #303030;">
                                                                            <i class="fa fa-file-pdf-o mr-3"
                                                                                style="color: red; font-size: 25px;"></i>
                                                                            {{ $dossier->name_doc }}
                                                                        </span>
                                                                    </label>
                                                                    @error('pj_id')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{!! $message !!}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="dynamicChamp row col-12">

                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label for=""> Nom du document</label>
                                                <input type="text" name="doc[0][doc_name]"
                                                    class="form-control  @error('doc[0][doc_name]') is-invalid @enderror"
                                                    value="{{ old('doc[0][doc_name]') }}"
                                                    placeholder="Entrez le nom de votre document">
                                                @error('doc[0][doc_name]')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{!! $message !!}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label for=""> Charger votre document</label>
                                                <input type="file" name="doc[0][doc_file]"
                                                    class="form-control @error('doc[0][doc_file]') is-invalid @enderror"
                                                    value="{{ old('doc[0][doc_file]') }}">
                                                @error('doc[0][doc_file]')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{!! $message !!}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="">.</label>
                                                <button type="button" name="add" id="add" class="add btn btn-info btn-sm">Ajouter</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dynamicTable">
                                            <tr>
                                                <th>Nom</th>
                                                <th>Montant</th>
                                                <th>Pourcentage (%)</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                                <td><input type="text" id="addmore_actionnaire0" name="addmore[0][actionnaire]" placeholder="Entrer le nom" class="form-control nom" /></td>
                                                <td><input type="text" id="addmore_montant0" name="addmore[0][montant]" placeholder="Enter le montant" class="form-control montant" /></td>
                                                <td><input type="text" id="addmore_pourcentage0" name="addmore[0][pourcentage]" value="" class="form-control pourcent" readOnly/></td>
                                                <td><button type="button" name="add" id="add" class="add btn btn-info btn-sm">Ajouter</button></td>
                                            </tr>
                                        </table>
                                   </div>

                                </div>
                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for=""> Description du projet</label>
                                            <textarea required
                                                placeholder="Decriver le projet en quelques lignes et soyer explicite."
                                                class="form-control description_project @error('description_project') is-invalid @enderror"
                                                value="{{ old('description_project') }}" name="description_project"
                                                id="ckeditor" cols="30" rows="10"></textarea>
                                            @error('description_project')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button class="btn btn-fodac-2" type="submit">Enregistrer votre dossier</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for=""> Description du projet</label>
                                            <textarea required
                                                placeholder="Decriver le projet en quelques lignes et soyer explicite."
                                                class="form-control description_project @error('description_project') is-invalid @enderror"
                                                value="{{ old('description_project') }}" name="description_project"
                                                id="ckeditor" cols="30" rows="10"></textarea>
                                            @error('description_project')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button class="btn btn-fodac-2" type="submit">Enregistrer votre dossier</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection


@section('scriptJs')

    @include('scripts._jsdemande')

    <script src="{{ asset('steps_form/js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/quill/dist/quill.min.js') }}" defer></script>


    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script type="text/javascript" defer>
        $(document).ready(function() {
            $('#ckeditor').ckeditor();

            var i = 0;
            $(".add").click(function() {
                ++i;
                $("#dynamicTable").append('<tr>' +
                    '<td><input type="text" id="addmore_actionnaire' + i + '" name="addmore[' + i +
                    '][actionnaire]" placeholder="Entrer le nom" class="form-control nom" /></td>' +
                    '<td><input type="text" id="addmore_montant' + i + '" name="addmore[' + i +
                    '][montant]" placeholder="Enter le montant" class="form-control montant" /></td>' +
                    '<td><input type="text" id="addmore_pourcentage' + i + '" name="addmore[' + i +
                    '][pourcentage]" class="form-control pourcent" value="" readOnly /></td>' +
                    '<td><button type="button" class="btn btn-danger btn-sm remove-tr">X</button> <button type="button" name="add" id="add" class="add btn btn-info btn-sm">Ajouter</button></td>' +
                    '</tr>');


            });

            // $(this).attr('disabled', true);

            //remove input
            $('.remove-tr').on('click', function() {
                $(this).parents('tr').remove();
                $('#result').val('');
                $('.add').removeAttr('disabled');
            });
        });
    </script>
    <!-- JQUERY STEP -->
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/nouislider/distribute/nouislider.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/quill/dist/quill.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone-amd-module.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}" defer></script>

    <script src="{{ asset('steps_form/js/jquery.steps.js') }}" defer></script>

    <script src="{{ asset('steps_form/js/main.js') }}" defer></script>
@endsection
