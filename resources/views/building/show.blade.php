
@extends('layouts/contentLayoutMaster')
{{/*$building->name */ }}
@section('title', 'Prédios')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Building</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('buildings.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $building->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $building->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $building->name }}
                        </div>
                        <div class="form-group">
                            <strong>Endereco:</strong>
                            {{ $building->endereco }}
                        </div>
                        <div class="form-group">
                            <strong>Diretoria:</strong>
                            {{ $building->diretoria }}
                        </div>
                        <div class="form-group">
                            <strong>Municipio:</strong>
                            {{ $building->municipio }}
                        </div>
                        <div class="form-group">
                            <strong>Bairro:</strong>
                            {{ $building->bairro }}
                        </div>
                        <div class="form-group">
                            <strong>Telefone:</strong>
                            {{ $building->telefone }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
