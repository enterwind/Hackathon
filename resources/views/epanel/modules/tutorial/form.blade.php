<div class="box-typical-body padding-panel">
    <div class="row">
        <div class="col-md-6">
            <fieldset class="form-group {{ $errors->has('label')?'form-group-error':'' }}">
                {!! Form::label('label', 'Label', ['class' => 'form-label']) !!}
                <div class="form-control-wrapper">
                    {!! Form::text('label', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('label', '<div class="form-tooltip-error sm">:message</div>') !!}
                </div>
            </fieldset>
        </div>
        <div class="col-md-6">
            <fieldset class="form-group {{ $errors->has('video_url')?'form-group-error':'' }}">
                {!! Form::label('video_url', 'Youtube URL', ['class' => 'form-label']) !!}
                <div class="form-control-wrapper">
                    {!! Form::text('video_url', null, ['class' => 'form-control', 'placeholder' => 'https://www.youtube.com/watch?v=YZWaI_Y_I1w']) !!}
                    {!! $errors->first('video_url', '<div class="form-tooltip-error sm">:message</div>') !!}
                </div>
            </fieldset>
        </div>
    </div>
</div>
        
