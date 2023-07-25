<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6 mb-1">
                <div class="form-group">
                    {{ Form::label('Tipo vistoria') }}
                    {{ Form::text('type_name', "Específica", ['class' => 'form-control select' . ($errors->has('type_name') ? ' is-invalid' : ''),  'placeholder' => 'Especifica', 'readonly' => true]) }}
                    {!! $errors->first('type_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-6 mb-1">
                <div class="form-group">
                    {{ Form::label('Orçamento') }}
                    {{ Form::text('budget_number', '', ['class' => 'form-control' . ($errors->has('budget_number') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                    {!! $errors->first('budget_number', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Data Vistoria') }}
                    {{ Form::date('inspection_date', '', ['class' => 'form-control' . ($errors->has('inspection_date') ? ' is-invalid' : ''), 'placeholder' => 'Inspection Date']) }}
                    {!! $errors->first('inspection_date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Código PI') }}
                    {{ Form::text('intervention_code', '', ['class' => 'form-control' . ($errors->has('intervention_code') ? ' is-invalid' : ''), 'placeholder' => 'Código PI', 'id' => 'intervention_code']) }}
                    {!! $errors->first('intervention_code', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Fiscal') }}
                    {{ Form::select('owner_id', $fiscal, old(''),  ['class' => 'form-control' . ($errors->has('owner_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecione']) }}
                    {!! $errors->first('owner_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div> 
            

        <div class="row">
            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Código Prédio') }}
                    {{ Form::text('building_code', '', ['class' => 'form-control' . ($errors->has('building_code') ? ' is-invalid' : ''), 'placeholder' => '', 'id' => "building_code"]) }}
                    {!! $errors->first('building_code', '<div class="invalid-feedback">:message</div>') !!}
                </div>          
            </div>

            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Nome Prédio') }}
                    {{ Form::text('building_id', '', ['class' => 'form-control' . ($errors->has('building_id') ? ' is-invalid' : ''), 'placeholder' => '','readonly' => true, 'id' => 'building_id']) }}
                    {!! $errors->first('building_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Diretoria') }}
                    {{ Form::text('diretory', '', ['class' => 'form-control' . ($errors->has('diretory') ? ' is-invalid' : ''), 'placeholder' => '','readonly' => true, 'id' => 'diretory']) }}
                    {!! $errors->first('diretory', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 box-footer mt20">
        <button type="submit" class="btn btn-primary" style="width: 100%">Cadastrar Vistoria</button>
    </div>
</div>