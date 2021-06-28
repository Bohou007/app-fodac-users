@extends('layouts.app', ['title' => 'Contactez le supports'])

@section('content')

    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card-wrapper">
                <!-- Default browser form validation -->
                <div class="card">
                    <div class="container">

                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Laissez nous un message</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">

                            <form action="{{ route('supports.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <label class="form-control-label" for="validationDefaultUsername">Objet (*)</label>
                                            <div class="input-group">
                                                <input value="" name="objet" type="text" value="{{old('objet')}}" class="form-control @error('objet') is-invalid @enderror"
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
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <label class="form-control-label" for="message">Message (*)</label>
                                            <textarea name="message" value="{{old('message')}}" class="form-control @error('message') is-invalid @enderror" id="message" cols="30" rows="10" placeholder="Entrez le contenue de votre message"></textarea>
                                            @error('message')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{!! $message !!}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-fodac-2" type="submit">Envoyer votre message</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
