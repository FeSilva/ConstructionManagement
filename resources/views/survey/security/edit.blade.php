<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 mb-1">
                <div class="form-group">
                    {{ Form::label('Tipo vistoria') }}

                    {{ Form::text('type_name', "Segurança do Trabalho", ['class' => 'form-control select' . ($errors->has('type_name') ? ' is-invalid' : ''),  'placeholder' => 'Segurança do Trabalho', 'readonly' => true]) }}
                    {!! $errors->first('type_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Data Vistoria') }}
                    {{ Form::date('inspection_date', $survey->inspection_date, ['class' => 'form-control' . ($errors->has('inspection_date') ? ' is-invalid' : ''), 'placeholder' => 'Inspection Date']) }}
                    {!! $errors->first('inspection_date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Código PI') }}
                    {{ Form::text('intervention_code', $survey->intervention_code ?? null, ['class' => 'form-control' . ($errors->has('intervention_code') ? ' is-invalid' : ''), 'placeholder' => 'Código PI','id' => "intervention_code"]) }}
                    {!! $errors->first('intervention_code', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="form-group">
                    {{ Form::label('Arquivo') }}
                    {{ Form::file('file_archive', $attributes = array('url' => 'foo/bar', 'files' => true, 'class' => 'form-control' . ($errors->has('date_close') ? ' is-invalid' : ''))) }}
                    {!! $errors->first('archive', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Fiscal') }}
                    {{ Form::select('owner_id', $fiscal, $survey->user->id,  ['class' => 'form-control' . ($errors->has('owner_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecione']) }}
                    {!! $errors->first('owner_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div> 
            

        <div class="row">
            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Código Prédio') }}
                    {{ Form::hidden('building_id', "", ['class' => 'form-control' . ($errors->has('building_id') ? ' is-invalid' : ''),  'id' => 'building_id', 'readonly' => true]) }}
                    {{ Form::text('building_code', $survey->interventionProcess->building->codigo ?? null, ['class' => 'form-control' . ($errors->has('building_code') ? ' is-invalid' : ''), 'placeholder' => '', 'readonly' => true,"id" => "building_code"]) }}
                    {!! $errors->first('building_code', '<div class="invalid-feedback">:message</div>') !!}
                </div>          
            </div>

            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Nome Prédio') }}
                    {{ Form::text('building_name', $survey->interventionProcess->building->name ?? null, ['class' => 'form-control' . ($errors->has('building_id') ? ' is-invalid' : ''), 'placeholder' => '','readonly' => true,"id" => "building_id"]) }}
                    {!! $errors->first('building_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Diretoria') }}
                    {{ Form::text('diretory', $survey->interventionProcess->building->diretoria ?? null, ['class' => 'form-control' . ($errors->has('diretory') ? ' is-invalid' : ''), 'placeholder' => '','readonly' => true,"id" => "diretory"]) }}
                    {!! $errors->first('diretory', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
</div>