<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $company->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('razao_social') }}
            {{ Form::text('razao_social', $company->razao_social, ['class' => 'form-control' . ($errors->has('razao_social') ? ' is-invalid' : ''), 'placeholder' => 'Razao Social']) }}
            {!! $errors->first('razao_social', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fantasia') }}
            {{ Form::text('fantasia', $company->fantasia, ['class' => 'form-control' . ($errors->has('fantasia') ? ' is-invalid' : ''), 'placeholder' => 'Fantasia']) }}
            {!! $errors->first('fantasia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cnpj') }}
            {{ Form::text('cnpj', $company->cnpj, ['class' => 'form-control' . ($errors->has('cnpj') ? ' is-invalid' : ''), 'placeholder' => 'Cnpj']) }}
            {!! $errors->first('cnpj', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>