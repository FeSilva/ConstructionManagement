<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 mb-1">
                <div class="form-group">
                    {{ Form::label('Tipo vistoria') }}
                    {{ Form::text('type_name', "Orçamento Complexo", ['class' => 'form-control select' . ($errors->has('type_name') ? ' is-invalid' : ''),  'placeholder' => 'Orçamento Complexo', 'readonly' => true]) }}
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
                    {{ Form::text('intervention_code', $survey->intervention_code, ['class' => 'form-control' . ($errors->has('intervention_code') ? ' is-invalid' : ''), 'placeholder' => 'Código PI','id' => "intervention_code"]) }}
                    {!! $errors->first('intervention_code', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
       
            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Fiscal') }}
                    {{ Form::select('owner_id', $fiscal, old(''),  ['class' => 'form-control' . ($errors->has('owner_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecione','id' => "owner_id"]) }}
                    {!! $errors->first('owner_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
       
            <div class="col-md-4 mb-2">
                {{ Form::label('Programa') }}
                <div class="form-group">
                    <input list="sel-opts" id="new-opt" class="form-control" name="programa"
                            value="" />
                    <small><span id="add-btn" class="btn btn-success" disabled>Adicionar +</span></small>
                    <datalist id="sel-opts">
                        @foreach ($programas as $key => $programa)

                            <option value="{{ $programa }}">{{ $programa }}</option>
                        @endforeach
                    </datalist>
                </div>
                <small><span id="msg_return"></span></small>
            </div>
        </div> 
            

        <div class="row">
            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Código Prédio') }}
                    {{ Form::text('building_code', '', ['class' => 'form-control' . ($errors->has('building_code') ? ' is-invalid' : ''), 'placeholder' => '', 'readonly' => true,"id" => "building_code"]) }}
                    {!! $errors->first('building_code', '<div class="invalid-feedback">:message</div>') !!}
                </div>          
            </div>

            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Nome Prédio') }}
                    {{ Form::text('building_id', '', ['class' => 'form-control' . ($errors->has('building_id') ? ' is-invalid' : ''), 'placeholder' => '','readonly' => true,"id" => "building_id"]) }}
                    {!! $errors->first('building_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Diretoria') }}
                    {{ Form::text('diretory', '', ['class' => 'form-control' . ($errors->has('diretory') ? ' is-invalid' : ''), 'placeholder' => '','readonly' => true,"id" => "diretory"]) }}
                    {!! $errors->first('diretory', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 box-footer mt20">
        <button type="submit" class="btn btn-primary" style="width: 100%">Cadastrar Vistoria</button>
    </div>
</div>