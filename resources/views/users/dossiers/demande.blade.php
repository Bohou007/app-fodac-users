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
    <div class="">
        @include('flash::message')
    </div>
    <div class="wrapper">
        <center>
            <form id="formDemande" action="{{ route('dossiers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="wizard">
                    <!-- SECTION 1 -->
                    <h4></h4>
                    <section>
                        <div class="form-row">
                            <label for=""> Nom du projet *</label>
                            <input required type="text" value="{{ old('name_project') }}" name="name_project"
                                class="form-control name @error('name_project') is-invalid @enderror"
                                placeholder="Entrer le nom du projet">
                            @error('name_project')
                                <span class="invalid-feedback text-left" role="alert">
                                    <strong>{!! $message !!}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <label for=""> Description du projet</label>
                            <textarea required placeholder="Decriver le projet en quelques lignes et soyer explicite."
                                class="form-control description_project @error('description_project') is-invalid @enderror"
                                value="{{ old('description_project') }}" name="description_project" id="ckeditor"
                                cols="30" rows="10"></textarea>
                            @error('description_project')
                                <span class="invalid-feedback text-left" role="alert">
                                    <strong>{!! $message !!}</strong>
                                </span>
                            @enderror
                        </div>

                    </section>

                    <!-- SECTION 2 -->
                    <h4></h4>
                    <section>
                        <div class="form-row">
                            <label for=""> Budget du projet</label>
                            <input required type="text" name="budget_oc"
                                class="form-control budget_oc @error('budget_oc') is-invalid @enderror"
                                value="{{ old('budget_oc') }}"
                                placeholder="Entrez le budget pour la realisation du projet.">
                            @error('budget_oc')
                                <span class="invalid-feedback text-left" role="alert">
                                    <strong>{!! $message !!}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <label for=""> Votre Capitale</label>
                            <input required type="text" name="capitale_oc"
                                class="form-control  @error('capitale_oc') is-invalid @enderror"
                                value="{{ old('capitale_oc') }}"
                                placeholder="Quels votre fond pour la realisation du projet.">
                            @error('capitale_oc')
                                <span class="invalid-feedback text-left" role="alert">
                                    <strong>{!! $message !!}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <label for=""> Capitale Demander</label>
                            <input required type="text" name="capitale_demander"
                                class="form-control @error('capitale_demander') is-invalid @enderror"
                                value="{{ old('capitale_demander') }}" placeholder="Entrez le montant demander">
                            @error('capitale_demander')
                                <span class="invalid-feedback text-left" role="alert">
                                    <strong>{!! $message !!}</strong>
                                </span>
                            @enderror
                        </div>
                    </section>

                    <!-- SECTION 3 -->
                    <h4></h4>
                    <section>
                        <div class="card-wrapper">
                            <div>
                                @if ($dossiers->count())
                                    <div class="table-responsive">
                                        <!-- Projects table -->
                                        <div class="table-responsive">
                                            <table class="table align-items-center table-flush">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" class="sort" data-sort="name">Nom du document</th>
                                                        <th scope="col" class="sort" data-sort="status">Sectionner</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    @foreach ($dossiers as $index => $dossier)
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="media align-items-center">
                                                                    <a href="#" class="avatar rounded-circle mr-3">
                                                                        <img alt="Image placeholder"
                                                                            src="{{ asset('images/pdf-image.png') }}">
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <span
                                                                            class="name mb-0 text-sm">{{ $dossier->name_doc }}</span>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <td class="budget">
                                                                <input type="checkbox" value="{{ $dossier->id }}"
                                                                    name="pj_id[{{ $index }}]"
                                                                    id="doc-{{ $dossier->id }}"
                                                                    class="form-controls  @error('pj_id') is-invalid @enderror">
                                                                @error('pj_id')
                                                                    <span class="invalid-feedback text-left" role="alert">
                                                                        <strong>{!! $message !!}</strong>
                                                                    </span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-row col-lg-12">
                                    <table class="" id="dynamicTable">
                                        <tr style="line-height: 41px;">
                                            <th>Nom du document</th>
                                            <th>Charger le fichier</th>
                                            <th></th>
                                        </tr> <br><br>
                                        <tr>
                                            <td style="margin-right: 10px;">
                                                <input type="text" id="doc_name0" name="doc[0][doc_name]"
                                                    placeholder="Entrer le nom"
                                                    class="form-control nom @error('doc[0][doc_name]') is-invalid @enderror" />
                                                @error('doc[0][doc_name]')
                                                    <span class="invalid-feedback text-left" role="alert">
                                                        <strong>{!! $message !!}</strong>
                                                    </span>
                                                @enderror
                                            </td>
                                            <td style="margin-right: 10px;">
                                                <input type="file" id="doc_file0" name="doc[0][doc_file]"
                                                    class="form-control montant @error('doc[0][doc_file]') is-invalid @enderror" />
                                                @error('doc[0][doc_file]')
                                                    <span class="invalid-feedback text-left" role="alert">
                                                        <strong>{!! $message !!}</strong>
                                                    </span>
                                                @enderror
                                            </td>
                                            <td>
                                                <button type="button" name="add" id="addDoc"
                                                    class="addDoc btn btn-info btn-sm">
                                                    +Ajouter
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- data-toggle="sweet-alert" data-sweet-alert="success" --}}
                </div>
            </form>
        </center>
    </div>
@endsection


@section('scriptJs')

    @include('scripts._jsdemande')

    <script src="{{ asset('steps_form/js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/quill/dist/quill.min.js') }}" defer></script>


    <script src="{{ asset('js/ckeditor.js') }}"></script>

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
