<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('Proprietário') }}
                    {{ Form::select('user_id', $users, $company->user->id ?? '', ['class' => 'select2-data-array form-control', 'id' => 'select2-array', 'placeholder' => 'Selecione'])}}
                    {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Razão Social') }}
                    {{ Form::text('razao_social', $company->razao_social, ['class' => 'form-control' . ($errors->has('razao_social') ? ' is-invalid' : ''), 'placeholder' => 'Razão Social']) }}
                    {!! $errors->first('razao_social', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('CNPJ') }}
                    {{ Form::text('cnpj', $company->cnpj, ['class' => 'form-control' . ($errors->has('cnpj') ? ' is-invalid' : ''), 'placeholder' => 'CNPJ']) }}
                    {!! $errors->first('cnpj', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('Fantasia') }}
                    {{ Form::text('fantasia', $company->fantasia, ['class' => 'form-control' . ($errors->has('fantasia') ? ' is-invalid' : ''), 'placeholder' => 'Fantasia']) }}
                    {!! $errors->first('fantasia', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="divider">
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success col-md-12">Salvar</button>
    </div>
</div>