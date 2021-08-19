@extends('layouts.app', ['title'=>'Charger votre Documents'])

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

                            <form action="{{ route('documents-administrative.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <label class="form-control-label"
                                                for="validationDefaultUsername">Nom du document</label>
                                            <div class="input-group">
                                                <input value="{{old('doc_name')}}" name="doc_name" type="text" class="form-control @error('doc_name') is-invalid @enderror" id="validationDefaultUsername"
                                                    placeholder="Entrez le nom de votre document" aria-describedby="inputGroupPrepend2"
                                                    required="">
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
                                            <label class="form-control-label" for="validationDefault03">Charger votre fichier (Format valid Pdf, xdoc..)</label>
                                            <input name="doc_file" value="{{old('doc_file')}}" type="file" class="form-control @error('doc_file') is-invalid @enderror" id="validationDefault03"
                                                 required="">
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
