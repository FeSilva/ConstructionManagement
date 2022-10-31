<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('contractor_id') }}
            {{ Form::text('contractor_id', $interventionProcess->contractor_id, ['class' => 'form-control' . ($errors->has('contractor_id') ? ' is-invalid' : ''), 'placeholder' => 'Contractor Id']) }}
            {!! $errors->first('contractor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('building_id') }}
            {{ Form::text('building_id', $interventionProcess->building_id, ['class' => 'form-control' . ($errors->has('building_id') ? ' is-invalid' : ''), 'placeholder' => 'Building Id']) }}
            {!! $errors->first('building_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $interventionProcess->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('code') }}
            {{ Form::text('code', $interventionProcess->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Code']) }}
            {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('programa') }}
            {{ Form::text('programa', $interventionProcess->programa, ['class' => 'form-control' . ($errors->has('programa') ? ' is-invalid' : ''), 'placeholder' => 'Programa']) }}
            {!! $errors->first('programa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type_of_work') }}
            {{ Form::text('type_of_work', $interventionProcess->type_of_work, ['class' => 'form-control' . ($errors->has('type_of_work') ? ' is-invalid' : ''), 'placeholder' => 'Type Of Work']) }}
            {!! $errors->first('type_of_work', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rv') }}
            {{ Form::text('rv', $interventionProcess->rv, ['class' => 'form-control' . ($errors->has('rv') ? ' is-invalid' : ''), 'placeholder' => 'Rv']) }}
            {!! $errors->first('rv', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type_of_contract') }}
            {{ Form::text('type_of_contract', $interventionProcess->type_of_contract, ['class' => 'form-control' . ($errors->has('type_of_contract') ? ' is-invalid' : ''), 'placeholder' => 'Type Of Contract']) }}
            {!! $errors->first('type_of_contract', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('company_name') }}
            {{ Form::text('company_name', $interventionProcess->company_name, ['class' => 'form-control' . ($errors->has('company_name') ? ' is-invalid' : ''), 'placeholder' => 'Company Name']) }}
            {!! $errors->first('company_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('number_contract') }}
            {{ Form::text('number_contract', $interventionProcess->number_contract, ['class' => 'form-control' . ($errors->has('number_contract') ? ' is-invalid' : ''), 'placeholder' => 'Number Contract']) }}
            {!! $errors->first('number_contract', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contractors_name') }}
            {{ Form::text('contractors_name', $interventionProcess->contractors_name, ['class' => 'form-control' . ($errors->has('contractors_name') ? ' is-invalid' : ''), 'placeholder' => 'Contractors Name']) }}
            {!! $errors->first('contractors_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('number_os') }}
            {{ Form::text('number_os', $interventionProcess->number_os, ['class' => 'form-control' . ($errors->has('number_os') ? ' is-invalid' : ''), 'placeholder' => 'Number Os']) }}
            {!! $errors->first('number_os', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('social_management_number') }}
            {{ Form::text('social_management_number', $interventionProcess->social_management_number, ['class' => 'form-control' . ($errors->has('social_management_number') ? ' is-invalid' : ''), 'placeholder' => 'Social Management Number']) }}
            {!! $errors->first('social_management_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $interventionProcess->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total_price') }}
            {{ Form::text('total_price', $interventionProcess->total_price, ['class' => 'form-control' . ($errors->has('total_price') ? ' is-invalid' : ''), 'placeholder' => 'Total Price']) }}
            {!! $errors->first('total_price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('discount') }}
            {{ Form::text('discount', $interventionProcess->discount, ['class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'placeholder' => 'Discount']) }}
            {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total_term') }}
            {{ Form::text('total_term', $interventionProcess->total_term, ['class' => 'form-control' . ($errors->has('total_term') ? ' is-invalid' : ''), 'placeholder' => 'Total Term']) }}
            {!! $errors->first('total_term', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pi_object') }}
            {{ Form::text('pi_object', $interventionProcess->pi_object, ['class' => 'form-control' . ($errors->has('pi_object') ? ' is-invalid' : ''), 'placeholder' => 'Pi Object']) }}
            {!! $errors->first('pi_object', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('count_surveys') }}
            {{ Form::text('count_surveys', $interventionProcess->count_surveys, ['class' => 'form-control' . ($errors->has('count_surveys') ? ' is-invalid' : ''), 'placeholder' => 'Count Surveys']) }}
            {!! $errors->first('count_surveys', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('signature_date') }}
            {{ Form::text('signature_date', $interventionProcess->signature_date, ['class' => 'form-control' . ($errors->has('signature_date') ? ' is-invalid' : ''), 'placeholder' => 'Signature Date']) }}
            {!! $errors->first('signature_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>