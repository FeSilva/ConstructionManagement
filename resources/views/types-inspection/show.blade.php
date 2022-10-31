@extends('layouts.app')

@section('template_title')
    {{ $typesInspection->name ?? 'Show Types Inspection' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Types Inspection</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('types_inspection.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $typesInspection->name }}
                        </div>
                        <div class="form-group">
                            <strong>Sigla:</strong>
                            {{ $typesInspection->sigla }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $typesInspection->description }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $typesInspection->status }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $typesInspection->price }}
                        </div>
                        <div class="form-group">
                            <strong>Amount To Receive:</strong>
                            {{ $typesInspection->amount_to_receive }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
