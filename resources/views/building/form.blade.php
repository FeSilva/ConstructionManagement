<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('codigo') }}
            {{ Form::text('codigo', $building->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $building->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('endereco') }}
            {{ Form::text('endereco', $building->endereco, ['class' => 'form-control' . ($errors->has('endereco') ? ' is-invalid' : ''), 'placeholder' => 'Endereco']) }}
            {!! $errors->first('endereco', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('diretoria') }}
            {{ Form::text('diretoria', $building->diretoria, ['class' => 'form-control' . ($errors->has('diretoria') ? ' is-invalid' : ''), 'placeholder' => 'Diretoria']) }}
            {!! $errors->first('diretoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('municipio') }}
            {{ Form::text('municipio', $building->municipio, ['class' => 'form-control' . ($errors->has('municipio') ? ' is-invalid' : ''), 'placeholder' => 'Municipio']) }}
            {!! $errors->first('municipio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('bairro') }}
            {{ Form::text('bairro', $building->bairro, ['class' => 'form-control' . ($errors->has('bairro') ? ' is-invalid' : ''), 'placeholder' => 'Bairro']) }}
            {!! $errors->first('bairro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefone') }}
            {{ Form::text('telefone', $building->telefone, ['class' => 'form-control' . ($errors->has('telefone') ? ' is-invalid' : ''), 'placeholder' => 'Telefone']) }}
            {!! $errors->first('telefone', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>