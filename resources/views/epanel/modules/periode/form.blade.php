<div class="box-typical-body padding-panel">
    <div class="row">
        <div class="col-md-12">
            <fieldset class="form-group {{ $errors->has('tahun')?'form-group-error':'' }}">
                {!! Form::label('tahun', 'Tahun', ['class' => 'form-label']) !!}
                <div class="form-control-wrapper">
                    {!! Form::input('number', 'tahun', null, ['class' => 'form-control', 
                        'placeholder' => 'Pertanyaan']) !!}
                    {!! $errors->first('tahun', '<div class="form-tooltip-error sm">:message</div>') !!}
                </div>
            </fieldset>
        </div>
    </div>
</div>
        
