<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6 mb-1">
                <div class="form-group">
                    {{ Form::label('Tipo vistoria') }}
                    {{ Form::text('type_name', "Gestão Social", ['class' => 'form-control select' . ($errors->has('type_name') ? ' is-invalid' : ''),  'placeholder' => 'Gestão Social', 'readonly' => true]) }}
                    {!! $errors->first('type_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 mb-1">
                <div class="form-group">
                    {{ Form::label('Data Vistoria') }}
                    {{ Form::date('inspection_date', '', ['class' => 'form-control' . ($errors->has('inspection_date') ? ' is-invalid' : ''), 'placeholder' => 'Inspection Date']) }}
                    {!! $errors->first('inspection_date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-1">
                <div class="form-group">
                    {{ Form::label('Código PI') }}
                    {{ Form::text('intervention_code','' , ['class' => 'form-control' . ($errors->has('intervention_code') ? ' is-invalid' : ''), 'placeholder' => 'Código PI','id'=>'intervention_code',]) }}
                    {!! $errors->first('intervention_code', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-6 mb-1">
                <div class="form-group">
                    {{ Form::label('Fiscal') }}
                    {{ Form::select('owner_id', $fiscal, old(''),  ['class' => 'form-control' . ($errors->has('owner_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecione','id'=>'owner_id']) }}
                    {!! $errors->first('owner_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div> 
            

     
        <div class="row">
            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Código Prédio') }}
                    {{ Form::text('building_code', '', ['class' => 'form-control' . ($errors->has('building_code') ? ' is-invalid' : ''), 'placeholder' => '','id'=>'building_code']) }}
                    {!! $errors->first('building_code', '<div class="invalid-feedback">:message</div>') !!}
                </div>          
            </div>

            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Nome Prédio') }}
                    {{ Form::text('building_id', '', ['class' => 'form-control' . ($errors->has('building_id') ? ' is-invalid' : ''), 'placeholder' => '','readonly' => true,'id'=>'building_id']) }}
                    {!! $errors->first('building_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Diretoria') }}
                    {{ Form::text('diretory', '', ['class' => 'form-control' . ($errors->has('diretory') ? ' is-invalid' : ''), 'placeholder' => '','readonly' => true,'id'=>'diretory']) }}
                    {!! $errors->first('diretory', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="gs_avanco_inicial">
            <div class="form-group">
                <input name="default-radio-1" class="form-check-input" name="advance_work" id="advance_work" type="radio" value="antes" id="defaultRadio1" />
                <label class="form-check-label" for="defaultRadio1">
                  Antes da Obra
                </label>
            </div>
        </div>
        <div class="col-md-4" id="gs_avanco_intermediario">
            <div class="form-group">
                <input name="default-radio-1" class="form-check-input" name="advance_work" id="advance_work" type="radio" value="durante" id="defaultRadio1" />
                <label class="form-check-label" for="defaultRadio1">
                    Durante a Obra
                </label>
            </div>
        </div>
        <div class="col-md-4" id="gs_avanco_final">
            <div class="form-group">
                <input name="default-radio-1" class="form-check-input" name="advance_work" id="advance_work" type="radio" value="pós" id="defaultRadio1" />
                <label class="form-check-label" for="defaultRadio1">
                    Pós a Obra
                </label>
            </div>
        </div>
    </div>

    <div class="col-md-12 box-footer mt20">
        <button type="submit" class="btn btn-primary" style="width: 100%">Cadastrar Vistoria</button>
    </div>
</div>