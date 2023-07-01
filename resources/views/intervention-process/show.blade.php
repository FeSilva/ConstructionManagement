@extends('layouts.app')

@section('template_title')
    {{ $interventionProcess->name ?? 'Show Intervention Process' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Intervention Process</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('intervention_process.list') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Contractor Id:</strong>
                            {{ $interventionProcess->contractor_id }}
                        </div>
                        <div class="form-group">
                            <strong>Building Id:</strong>
                            {{ $interventionProcess->building_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $interventionProcess->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Code:</strong>
                            {{ $interventionProcess->code }}
                        </div>
                        <div class="form-group">
                            <strong>Programa:</strong>
                            {{ $interventionProcess->programa }}
                        </div>
                        <div class="form-group">
                            <strong>Type Of Work:</strong>
                            {{ $interventionProcess->type_of_work }}
                        </div>
                        <div class="form-group">
                            <strong>Rv:</strong>
                            {{ $interventionProcess->rv }}
                        </div>
                        <div class="form-group">
                            <strong>Type Of Contract:</strong>
                            {{ $interventionProcess->type_of_contract }}
                        </div>
                        <div class="form-group">
                            <strong>Company Name:</strong>
                            {{ $interventionProcess->company_name }}
                        </div>
                        <div class="form-group">
                            <strong>Number Contract:</strong>
                            {{ $interventionProcess->number_contract }}
                        </div>
                        <div class="form-group">
                            <strong>Contractors Name:</strong>
                            {{ $interventionProcess->contractors_name }}
                        </div>
                        <div class="form-group">
                            <strong>Number Os:</strong>
                            {{ $interventionProcess->number_os }}
                        </div>
                        <div class="form-group">
                            <strong>Social Management Number:</strong>
                            {{ $interventionProcess->social_management_number }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $interventionProcess->description }}
                        </div>
                        <div class="form-group">
                            <strong>Total Price:</strong>
                            {{ $interventionProcess->total_price }}
                        </div>
                        <div class="form-group">
                            <strong>Discount:</strong>
                            {{ $interventionProcess->discount }}
                        </div>
                        <div class="form-group">
                            <strong>Total Term:</strong>
                            {{ $interventionProcess->total_term }}
                        </div>
                        <div class="form-group">
                            <strong>Pi Object:</strong>
                            {{ $interventionProcess->pi_object }}
                        </div>
                        <div class="form-group">
                            <strong>Count Surveys:</strong>
                            {{ $interventionProcess->count_surveys }}
                        </div>
                        <div class="form-group">
                            <strong>Signature Date:</strong>
                            {{ $interventionProcess->signature_date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
