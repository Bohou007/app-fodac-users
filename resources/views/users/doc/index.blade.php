@extends('layouts.app', ['title'=>'Documents Complementaire'])

@section('content')
    <div class="card-deck flex-column flex-xl-row">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <!-- Surtitle -->
                        <h6 class="surtitle">Dossiers</h6>
                        <!-- Title -->
                        <h5 class="h3 mb-0">Sauvegardez vos dcuments</h5>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('documents-administrative.create') }}" class="btn btn-sm btn-neutral">Ajouter</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <!-- Surtitle -->
                        <h6 class="surtitle">Document pour dossiers incomplet</h6>
                        <!-- Title -->
                        <h5 class="h3 mb-0">Documents complementaire</h5>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('document-complementaires.create') }}" class="btn btn-sm btn-neutral">Ajouter</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Tous vos documents</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Nom du document</th>
                                    <th scope="col" class="sort" data-sort="budget">Type</th>
                                    <th scope="col" class="sort" data-sort="status">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($documents as $document)
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="{{ asset('images/pdf-image.png') }}">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">{{ $document->name_doc }}</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            {{ $document->type_doc }}
                                        </td>
                                        <td>
                                            <a href="{{ asset('documents/'. $document->path_doc) }}" target="_blank" class="btn btn-sm btn-neutral" style="color: #3454a1 !important;">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{asset('documents/'. $document->path_doc)}}" download="{{ $document->name }}_{{ Auth::user()->first_name }}-{{ Auth::user()->last_name }}_{{ $document->name_doc }} - document_fodac.pdf" class="btn btn-fodac-1 btn-sm">
                                                <i class="fa fa-download fa-sm mr-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="6">
                                            <h3>---- Pas de document ----</h3>
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
@endsection
