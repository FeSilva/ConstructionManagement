<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fantasy_name') }}
            {{ Form::text('fantasy_name', $contractor->fantasy_name, ['class' => 'form-control' . ($errors->has('fantasy_name') ? ' is-invalid' : ''), 'placeholder' => 'Fantasy Name']) }}
            {!! $errors->first('fantasy_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tax_id') }}
            {{ Form::text('tax_id', $contractor->tax_id, ['class' => 'form-control' . ($errors->has('tax_id') ? ' is-invalid' : ''), 'placeholder' => 'Tax Id']) }}
            {!! $errors->first('tax_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('zipcode') }}
            {{ Form::text('zipcode', $contractor->zipcode, ['class' => 'form-control' . ($errors->has('zipcode') ? ' is-invalid' : ''), 'placeholder' => 'Zipcode']) }}
            {!! $errors->first('zipcode', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('endereco') }}
            {{ Form::text('endereco', $contractor->endereco, ['class' => 'form-control' . ($errors->has('endereco') ? ' is-invalid' : ''), 'placeholder' => 'Endereco']) }}
            {!! $errors->first('endereco', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('municipio') }}
            {{ Form::text('municipio', $contractor->municipio, ['class' => 'form-control' . ($errors->has('municipio') ? ' is-invalid' : ''), 'placeholder' => 'Municipio']) }}
            {!! $errors->first('municipio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('bairro') }}
            {{ Form::text('bairro', $contractor->bairro, ['class' => 'form-control' . ($errors->has('bairro') ? ' is-invalid' : ''), 'placeholder' => 'Bairro']) }}
            {!! $errors->first('bairro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('phone') }}
            {{ Form::text('phone', $contractor->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $contractor->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contact_name') }}
            {{ Form::text('contact_name', $contractor->contact_name, ['class' => 'form-control' . ($errors->has('contact_name') ? ' is-invalid' : ''), 'placeholder' => 'Contact Name']) }}
            {!! $errors->first('contact_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('phone_opcional') }}
            {{ Form::text('phone_opcional', $contractor->phone_opcional, ['class' => 'form-control' . ($errors->has('phone_opcional') ? ' is-invalid' : ''), 'placeholder' => 'Phone Opcional']) }}
            {!! $errors->first('phone_opcional', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contact_name_opcional') }}
            {{ Form::text('contact_name_opcional', $contractor->contact_name_opcional, ['class' => 'form-control' . ($errors->has('contact_name_opcional') ? ' is-invalid' : ''), 'placeholder' => 'Contact Name Opcional']) }}
            {!! $errors->first('contact_name_opcional', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email_opcional') }}
            {{ Form::text('email_opcional', $contractor->email_opcional, ['class' => 'form-control' . ($errors->has('email_opcional') ? ' is-invalid' : ''), 'placeholder' => 'Email Opcional']) }}
            {!! $errors->first('email_opcional', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('created_by') }}
            {{ Form::text('created_by', $contractor->created_by, ['class' => 'form-control' . ($errors->has('created_by') ? ' is-invalid' : ''), 'placeholder' => 'Created By']) }}
            {!! $errors->first('created_by', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>