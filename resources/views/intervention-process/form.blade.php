<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-2 mb-1">
                <div class="form-group">
                    {{ Form::label('Código') }}
                    {{ Form::text('code', $interventionProcess->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Code']) }}
                    {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-2 mb-1">
                <div class="form-group">
                    {{ Form::label('RV') }}
                    {{ Form::text('rv', $interventionProcess->rv, ['class' => 'form-control' . ($errors->has('rv') ? ' is-invalid' : ''), 'placeholder' => 'Rv']) }}
                    {!! $errors->first('rv', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-2 mb-1">
                <div class="form-group">
                    {{ Form::label('Nº Contrato') }}
                    {{ Form::text('number_contract', $interventionProcess->number_contract, ['class' => 'form-control' . ($errors->has('number_contract') ? ' is-invalid' : ''), 'placeholder' => 'Number Contract']) }}
                    {!! $errors->first('number_contract', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-2 mb-1">
                <div class="form-group">
                    {{ Form::label('Nº OS') }}
                    {{ Form::text('number_os', $interventionProcess->number_os, ['class' => 'form-control' . ($errors->has('number_os') ? ' is-invalid' : ''), 'placeholder' => 'Number Os']) }}
                    {!! $errors->first('number_os', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-2 mb-1">
                <div class="form-group">
                    {{ Form::label('Vistorias por Mês') }}
                    {{ Form::text('count_surveys', $interventionProcess->count_surveys, ['class' => 'form-control' . ($errors->has('count_surveys') ? ' is-invalid' : ''), 'placeholder' => 'Count Surveys']) }}
                    {!! $errors->first('count_surveys', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col-md-2 mb-1">
                <div class="form-group">
                    {{ Form::label('Nº Gestão Social') }}
                    {{ Form::text('social_management_number', $interventionProcess->social_management_number, ['class' => 'form-control' . ($errors->has('social_management_number') ? ' is-invalid' : ''), 'placeholder' => 'Social Management Number']) }}
                    {!! $errors->first('social_management_number', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-1">
                <div class="form-group">
                    {{ Form::label('Código Prédio') }}
                    {{ Form::text('building_code', '', ['class' => 'form-control' . ($errors->has('building_code') ? ' is-invalid' : ''), 'placeholder' => '', "id" => "building_code"]) }}
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
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('Contratação') }}
                    {{ Form::select('type_of_contract', [
                        'ATA' => 'ATA',
                        'LIC' => 'LIC',
                        'D.L.' => 'D.L.',
                        'C.V' => 'Carta Convite',
                        'LIC' => 'Licitação',
                        'DISPLIC' => 'Dispensa Licitação'
                    ],old("type_of_contract"), ['class' => 'form-control' . ($errors->has('type_of_contract') ? ' is-invalid' : ''), 'placeholder' => 'Type Of Contract']) }}
                    {!! $errors->first('type_of_contract', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('Empresa Contratada') }}
                    {{ Form::select('contractor_id', $contractors, old(''),  ['class' => 'form-control' . ($errors->has('contractor_id') ? ' is-invalid' : ''), 'placeholder' => 'Empresa Contratada']) }}
                    {!! $errors->first('contractor_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
           
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('Nome Contratada') }}
                    {{ Form::text('contractors_name', $interventionProcess->contractors_name, ['class' => 'form-control' . ($errors->has('contractors_name') ? ' is-invalid' : ''), 'placeholder' => 'Contractors Name']) }}
                    {!! $errors->first('contractors_name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

           
        </div>

        <div class="divider"></div>
      
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('Assinatura') }}
                    {{ Form::date('signature_date', $interventionProcess->signature_date, ['class' => 'form-control' . ($errors->has('signature_date') ? ' is-invalid' : ''), 'placeholder' => 'Signature Date']) }}
                    {!! $errors->first('signature_date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('Valor Total') }}
                    {{ Form::text('total_price', $interventionProcess->total_price, ['class' => 'form-control' . ($errors->has('total_price') ? ' is-invalid' : ''), 'placeholder' => 'Total Price']) }}
                    {!! $errors->first('total_price', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('Prazo Total') }}
                    {{ Form::text('total_term', $interventionProcess->total_term, ['class' => 'form-control' . ($errors->has('total_term') ? ' is-invalid' : ''), 'placeholder' => 'Total Term']) }}
                    {!! $errors->first('total_term', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="divider"></div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('Objeto do Pi') }}
                    {{ Form::select('pi_object', [ //Criar Table/model para tipos de items ?
                    "Reforma" => "Reforma",
                    "AVCB - Obtenção" => "AVCB - Obtenção",
                    "AVCB - Renovação" => "AVCB - Renovação",
                    "Acessibilidade" => "Acessibilidade",
                    "Obra Nova" => 'Obra Nova'
                ],old("pi_object"), ['class' => 'form-control' . ($errors->has('pi_object') ? ' is-invalid' : ''), 'placeholder' => 'Pi Object']) }}
                    {!! $errors->first('pi_object', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('Fiscal') }}
                    {{ Form::select('user_id', $fiscal, old('user_id'), ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecione um Fiscal']) }}
                    {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('Programa') }}
                    {{ Form::select('programa', $programas, old("programa"), ['class' => 'form-control' . ($errors->has('programa') ? ' is-invalid' : ''), 'placeholder' => 'Programa']) }}
                    {!! $errors->first('programa', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
           
        </div>

        <div class="divider"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('Descição') }}
                    {{ Form::text('description', $interventionProcess->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
                    {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

    </div>
    <div class="divider">
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success col-md-12">Salvar</button>
    </div>
</div>