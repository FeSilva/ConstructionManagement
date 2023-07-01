<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Código PI') }}
                    {{ Form::text('intervention_code', old('intervention_code'), ['class' => 'form-control' . ($errors->has('intervention_code') ? ' is-invalid' : ''), 'id' => 'intervention_code','placeholder' => 'Código PI']) }}
                    {!! $errors->first('intervention_code', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Nome Prédio') }}
                    {{ Form::text('building_id', old('building_id'), ['class' => 'form-control' . ($errors->has('building_id') ? ' is-invalid' : ''), "readonly" => true, 'id' => 'building_id','placeholder' => 'Nome do Prédio']) }}
                    {!! $errors->first('building_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Diretoria') }}
                    {{ Form::text('diretory', old('diretor'), ['class' => 'form-control' . ($errors->has('diretory') ? ' is-invalid' : ''), "readonly" => true,'id' => 'diretory','placeholder' => 'Diretoria']) }}
                    {!! $errors->first('diretory', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="form-group">
                    {{ Form::label('Tipo vistoria') }}
                    {{ Form::text('type_name', "Abertura", ['class' => 'form-control select' . ($errors->has('type_name') ? ' is-invalid' : ''),  'placeholder' => 'Abertura']) }}
                    {!! $errors->first('type_name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    {{ Form::label('Data de Abertura') }}
                    {{ Form::date('inspection_date', old('inspection_date'), ['class' => 'form-control' . ($errors->has('inspection_date') ? ' is-invalid' : ''), 'placeholder' => 'inspection_date']) }}
                    {!! $errors->first('inspection_date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    {{ Form::label('Arquivo') }}
                    {{ Form::file('file_archive', $attributes = array('url' => 'foo/bar', 'files' => true, 'class' => 'form-control' . ($errors->has('date_close') ? ' is-invalid' : ''))) }}
                    {!! $errors->first('archive', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <!--
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
        </div>-->

    </div>
    <div class="col-md-12 box-footer mt20">
        <button type="submit" class="btn btn-primary" style="width: 100%">Cadastrar Vistoria</button>
    </div>
</div>