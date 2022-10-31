@extends('layouts.app')

@section('template_title')
    {{ $contractor->name ?? 'Show Contractor' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Contractor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('contractors.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fantasy Name:</strong>
                            {{ $contractor->fantasy_name }}
                        </div>
                        <div class="form-group">
                            <strong>Tax Id:</strong>
                            {{ $contractor->tax_id }}
                        </div>
                        <div class="form-group">
                            <strong>Zipcode:</strong>
                            {{ $contractor->zipcode }}
                        </div>
                        <div class="form-group">
                            <strong>Endereco:</strong>
                            {{ $contractor->endereco }}
                        </div>
                        <div class="form-group">
                            <strong>Municipio:</strong>
                            {{ $contractor->municipio }}
                        </div>
                        <div class="form-group">
                            <strong>Bairro:</strong>
                            {{ $contractor->bairro }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $contractor->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $contractor->email }}
                        </div>
                        <div class="form-group">
                            <strong>Contact Name:</strong>
                            {{ $contractor->contact_name }}
                        </div>
                        <div class="form-group">
                            <strong>Phone Opcional:</strong>
                            {{ $contractor->phone_opcional }}
                        </div>
                        <div class="form-group">
                            <strong>Contact Name Opcional:</strong>
                            {{ $contractor->contact_name_opcional }}
                        </div>
                        <div class="form-group">
                            <strong>Email Opcional:</strong>
                            {{ $contractor->email_opcional }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $contractor->created_by }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
