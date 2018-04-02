<div class="box-typical-body padding-panel">
    <div class="row">
        <div class="col-md-12">
            <fieldset class="form-group {{ $errors->has('question')?'form-group-error':'' }}">
                {!! Form::label('question', 'Pertanyaan', ['class' => 'form-label']) !!}
                <div class="form-control-wrapper">
                    {!! Form::textarea('question', null, ['class' => 'form-control summernote', 
                        'placeholder' => 'Pertanyaan']) !!}
                    {!! $errors->first('question', '<div class="form-tooltip-error sm">:message</div>') !!}
                </div>
            </fieldset>
            <fieldset class="form-group {{ $errors->has('answer')?'form-group-error':'' }}">
                {!! Form::label('answer', 'Jawaban', ['class' => 'form-label']) !!}
                <div class="form-control-wrapper">
                    {!! Form::textarea('answer', null, ['class' => 'form-control summernote', 
                        'placeholder' => 'Jawaban']) !!}
                    {!! $errors->first('answer', '<div class="form-tooltip-error sm">:message</div>') !!}
                </div>
            </fieldset>
        </div>
    </div>
</div>
        
