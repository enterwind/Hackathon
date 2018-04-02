<div class="box-typical-body padding-panel">
    <div class="row">
        <div class="col-md-12">
            <fieldset class="form-group {{ $errors->has('label')?'form-group-error':'' }}">
                {!! Form::label('label', 'Label', ['class' => 'form-label']) !!}
                <div class="form-control-wrapper">
                    {!! Form::text('label', null, ['class' => 'form-control', 
                        'placeholder' => 'Persyaratan']) !!}
                    {!! $errors->first('label', '<div class="form-tooltip-error sm">:message</div>') !!}
                </div>
            </fieldset>
        </div>
    </div>
</div>
        
