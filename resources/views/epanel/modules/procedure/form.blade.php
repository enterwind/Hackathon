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

            <fieldset class="form-group {{ $errors->has('desc')?'form-group-error':'' }}">
                {!! Form::label('desc', 'Deskripsi', ['class' => 'form-label']) !!}
                <div class="form-control-wrapper">
                    {!! Form::textarea('desc', null, ['class' => 'form-control', 'rows' => 3]) !!}
                    {!! $errors->first('desc', '<div class="form-tooltip-error sm">:message</div>') !!}
                </div>
            </fieldset>

        </div>

        <div class="col-md-{{ isset($edit) ? '4' : '6' }}">
            <fieldset class="form-group {{ $errors->has('icon')?'form-group-error':'' }}">
                {!! Form::label('icon', 'Icon', ['class' => 'form-label']) !!}
                <div class="form-control-wrapper">
                    {!! Form::file('icon', ['class' => 'form-control']) !!}
                    {!! $errors->first('icon', '<div class="form-tooltip-error sm">:message</div>') !!}
                </div>
                <p class="small">*Untuk hasil yang maksimal, usahakan ukuran gambar adalah <b>300x300</b>px.</p>
            </fieldset>
        </div>
        @if(isset($edit))
        <div class="col-md-1">
            <img src="{{ asset("upload/procedure/$edit->icon") }}" width="200px">
        </div>
        @endif
    </div>
</div>
        
