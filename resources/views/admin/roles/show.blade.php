@extends('layouts.appAdn', ['title' => 'Rôle '.$role->name])

@section('css')

    <style>

    </style>

@endsection

@php
$etoile = '<span class="text-danger">*</span>';
$champsObligatoire = '<p class="text text-danger h4"> (*)  Champs obligatoires</p>';
@endphp

@section('content')
    <section id="main-content">
        <section class="wrapper pt-5 px-5">
            {{-- <h3 class="title"><i class="fa fa-angle-right"></i> Rôle {{ $role->display_name }}</h3> --}}
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <!-- Formulaire de creation de role -->
                <div class="col-lg-12 bg-white shadow p-5 mb-5" id="">
                    <form class="style-form" action="{{ route('admin.role.store') }}" method="POST">
                        @csrf
                        <div class="col-md-12 input-group-lg">
                            <div class="col-lg-12">
                                @include('flash::message')
                            </div>
                            <div class="col-lg-12 mb-3 text-right">
                                <h4 class="mb text-uppercase"> <a class="btn btn-fodac-1"
                                        href="{{ route('admin.roles') }}"><i class="fa fa-list"></i> rôles</a> </h4>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label class="title" for="nom">Nom du rôle{!! $etoile !!}</label>
                                <input type="text" name="display_name" class="form-control"
                                    value="{{ $role->display_name }}" readonly>
                            </div>

                            @include('admin.roles._form')
                        </div>

                        <div class="col-md-12 input-group-lg mt-5">
                            <div class="col-lg-12 mb-3 text-right">
                                {{-- <button type="reset" id="" class="btn btn-danger mr-3"><i class="fa fa-undo"></i> Annuler</button> --}}
                                <a href="{{ route('admin.role.edit', $role->id) }}" id="" class="btn btn-fodac-2"><i
                                        class="fa fa-edit"></i> Modifier</a>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- col-lg-12-->
            </div>
            <!-- /row -->

        </section>
        <!-- /wrapper -->
    </section>

@endsection

@section('js')
    {{-- @include('scriptsjs.demandeshow') --}}
@endsection
