@extends('layouts.app')

@section('template_title')
    {{ $survey->name ?? 'Show Survey' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Survey</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('surveys.list') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Intervention Id:</strong>
                            {{ $survey->intervention_id }}
                        </div>
                        <div class="form-group">
                            <strong>Type Id:</strong>
                            {{ $survey->type_id }}
                        </div>
                        <div class="form-group">
                            <strong>Subtype Id:</strong>
                            {{ $survey->subtype_id }}
                        </div>
                        <div class="form-group">
                            <strong>Progress Id:</strong>
                            {{ $survey->progress_id }}
                        </div>
                        <div class="form-group">
                            <strong>Owner Id:</strong>
                            {{ $survey->owner_id }}
                        </div>
                        <div class="form-group">
                            <strong>Rhythms Id:</strong>
                            {{ $survey->rhythms_id }}
                        </div>
                        <div class="form-group">
                            <strong>Program:</strong>
                            {{ $survey->program }}
                        </div>
                        <div class="form-group">
                            <strong>Intervention Code:</strong>
                            {{ $survey->intervention_code }}
                        </div>
                        <div class="form-group">
                            <strong>Building Code:</strong>
                            {{ $survey->building_code }}
                        </div>
                        <div class="form-group">
                            <strong>Date Close:</strong>
                            {{ $survey->date_close }}
                        </div>
                        <div class="form-group">
                            <strong>Inspection Date:</strong>
                            {{ $survey->inspection_date }}
                        </div>
                        <div class="form-group">
                            <strong>Budget Number:</strong>
                            {{ $survey->budget_number }}
                        </div>
                        <div class="form-group">
                            <strong>Archive:</strong>
                            {{ $survey->archive }}
                        </div>
                        <div class="form-group">
                            <strong>Name Archive:</strong>
                            {{ $survey->name_archive }}
                        </div>
                        <div class="form-group">
                            <strong>Employess:</strong>
                            {{ $survey->employess }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $survey->status }}
                        </div>
                        <div class="form-group">
                            <strong>Physical Progress:</strong>
                            {{ $survey->physical_progress }}
                        </div>
                        <div class="form-group">
                            <strong>Merge:</strong>
                            {{ $survey->merge }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
