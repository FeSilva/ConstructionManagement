<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('intervention_id') }}
            {{ Form::text('intervention_id', $survey->intervention_id, ['class' => 'form-control' . ($errors->has('intervention_id') ? ' is-invalid' : ''), 'placeholder' => 'Intervention Id']) }}
            {!! $errors->first('intervention_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type_id') }}
            {{ Form::text('type_id', $survey->type_id, ['class' => 'form-control' . ($errors->has('type_id') ? ' is-invalid' : ''), 'placeholder' => 'Type Id']) }}
            {!! $errors->first('type_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('subtype_id') }}
            {{ Form::text('subtype_id', $survey->subtype_id, ['class' => 'form-control' . ($errors->has('subtype_id') ? ' is-invalid' : ''), 'placeholder' => 'Subtype Id']) }}
            {!! $errors->first('subtype_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('progress_id') }}
            {{ Form::text('progress_id', $survey->progress_id, ['class' => 'form-control' . ($errors->has('progress_id') ? ' is-invalid' : ''), 'placeholder' => 'Progress Id']) }}
            {!! $errors->first('progress_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('owner_id') }}
            {{ Form::text('owner_id', $survey->owner_id, ['class' => 'form-control' . ($errors->has('owner_id') ? ' is-invalid' : ''), 'placeholder' => 'Owner Id']) }}
            {!! $errors->first('owner_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rhythms_id') }}
            {{ Form::text('rhythms_id', $survey->rhythms_id, ['class' => 'form-control' . ($errors->has('rhythms_id') ? ' is-invalid' : ''), 'placeholder' => 'Rhythms Id']) }}
            {!! $errors->first('rhythms_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('program') }}
            {{ Form::text('program', $survey->program, ['class' => 'form-control' . ($errors->has('program') ? ' is-invalid' : ''), 'placeholder' => 'Program']) }}
            {!! $errors->first('program', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('intervention_code') }}
            {{ Form::text('intervention_code', $survey->intervention_code, ['class' => 'form-control' . ($errors->has('intervention_code') ? ' is-invalid' : ''), 'placeholder' => 'Intervention Code']) }}
            {!! $errors->first('intervention_code', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('building_code') }}
            {{ Form::text('building_code', $survey->building_code, ['class' => 'form-control' . ($errors->has('building_code') ? ' is-invalid' : ''), 'placeholder' => 'Building Code']) }}
            {!! $errors->first('building_code', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date_close') }}
            {{ Form::text('date_close', $survey->date_close, ['class' => 'form-control' . ($errors->has('date_close') ? ' is-invalid' : ''), 'placeholder' => 'Date Close']) }}
            {!! $errors->first('date_close', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('inspection_date') }}
            {{ Form::text('inspection_date', $survey->inspection_date, ['class' => 'form-control' . ($errors->has('inspection_date') ? ' is-invalid' : ''), 'placeholder' => 'Inspection Date']) }}
            {!! $errors->first('inspection_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('budget_number') }}
            {{ Form::text('budget_number', $survey->budget_number, ['class' => 'form-control' . ($errors->has('budget_number') ? ' is-invalid' : ''), 'placeholder' => 'Budget Number']) }}
            {!! $errors->first('budget_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archive') }}
            {{ Form::text('archive', $survey->archive, ['class' => 'form-control' . ($errors->has('archive') ? ' is-invalid' : ''), 'placeholder' => 'Archive']) }}
            {!! $errors->first('archive', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name_archive') }}
            {{ Form::text('name_archive', $survey->name_archive, ['class' => 'form-control' . ($errors->has('name_archive') ? ' is-invalid' : ''), 'placeholder' => 'Name Archive']) }}
            {!! $errors->first('name_archive', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('employess') }}
            {{ Form::text('employess', $survey->employess, ['class' => 'form-control' . ($errors->has('employess') ? ' is-invalid' : ''), 'placeholder' => 'Employess']) }}
            {!! $errors->first('employess', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $survey->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('physical_progress') }}
            {{ Form::text('physical_progress', $survey->physical_progress, ['class' => 'form-control' . ($errors->has('physical_progress') ? ' is-invalid' : ''), 'placeholder' => 'Physical Progress']) }}
            {!! $errors->first('physical_progress', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('merge') }}
            {{ Form::text('merge', $survey->merge, ['class' => 'form-control' . ($errors->has('merge') ? ' is-invalid' : ''), 'placeholder' => 'Merge']) }}
            {!! $errors->first('merge', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>