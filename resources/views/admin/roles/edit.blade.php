@extends('layouts.appAdn', ['title' => 'Edition du role '. $role->display_name])

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
            {{-- <h3 class="title"><i class="fa fa-angle-right"></i> Modification du rôle {{ $role->display_name }}</h3> --}}
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <!-- Formulaire de creation de role -->
                <div class="col-lg-12 bg-white shadow p-5 mb-5" id="">
                    <form class="style-form" action="{{ route('admin.role.update', $role->id) }}" method="POST">
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
                                <label for="nom">Nom du rôle{!! $etoile !!}</label>
                                <input type="text" name="display_name" class="form-control"
                                    value="{{ $role->display_name }}">
                            </div>

                            @include('admin.roles._form')
                        </div>

                        <div class="col-md-12 input-group-lg mt-5">
                            <div class="col-lg-12 mb-3">
                                <button type="reset" id="" class="btn btn-warning btn-lg mr-3"><i
                                        class="fa fa-undo"></i> Annuler</button>
                                <button type="submit" id="enregistrer" class="btn btn-fodac-1 btn-lg"><i
                                        class="fa fa-check"></i> Valider</button>
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
    {{-- @include('scriptsjs.enregistrement') --}}
@endsection
