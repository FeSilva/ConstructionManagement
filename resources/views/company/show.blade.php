@extends('layouts/contentLayoutMaster')
{{/*$company->name*/ }}
@section('title', 'Empresas')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Company</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $company->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Razao Social:</strong>
                            {{ $company->razao_social }}
                        </div>
                        <div class="form-group">
                            <strong>Fantasia:</strong>
                            {{ $company->fantasia }}
                        </div>
                        <div class="form-group">
                            <strong>Cnpj:</strong>
                            {{ $company->cnpj }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
