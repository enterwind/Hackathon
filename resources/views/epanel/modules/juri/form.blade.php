<div class="box-typical-body padding-panel">
    <div class="row">
        <div class="col-md-6">

            <fieldset class="form-group {{ $errors->has('nama')?'form-group-error':'' }}">
                {!! Form::label('nama', 'Nama*', ['class' => 'form-label']) !!}
                <div class="form-control-wrapper">
                    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nama', '<div class="form-tooltip-error sm">:message</div>') !!}
                </div>
            </fieldset>

            <fieldset class="form-group {{ $errors->has('profesi')?'form-group-error':'' }}">
                {!! Form::label('profesi', 'Profesi*', ['class' => 'form-label']) !!}
                <div class="form-control-wrapper">
                    {!! Form::text('profesi', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('profesi', '<div class="form-tooltip-error sm">:message</div>') !!}
                </div>
            </fieldset>

            <hr/>

            <div class="row">
                <div class="col-md-4">
                    <fieldset class="form-group {{ $errors->has('facebook')?'form-group-error':'' }}">
                        {!! Form::label('facebook', 'Facebook', ['class' => 'form-label']) !!}
                        <div class="form-control-wrapper">
                            {!! Form::text('facebook', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('facebook', '<div class="form-tooltip-error sm">:message</div>') !!}
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-4">
                    <fieldset class="form-group {{ $errors->has('twitter')?'form-group-error':'' }}">
                        {!! Form::label('twitter', 'Twitter', ['class' => 'form-label']) !!}
                        <div class="form-control-wrapper">
                            {!! Form::text('twitter', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('twitter', '<div class="form-tooltip-error sm">:message</div>') !!}
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-4">
                    <fieldset class="form-group {{ $errors->has('instagram')?'form-group-error':'' }}">
                        {!! Form::label('instagram', 'Instagram', ['class' => 'form-label']) !!}
                        <div class="form-control-wrapper">
                            {!! Form::text('instagram', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('instagram', '<div class="form-tooltip-error sm">:message</div>') !!}
                        </div>
                    </fieldset>
                </div>
            </div>

        </div>

        <div class="col-md-{{ isset($edit) ? '4' : '6' }}">
            <fieldset class="form-group {{ $errors->has('foto')?'form-group-error':'' }}">
                {!! Form::label('foto', 'Foto*', ['class' => 'form-label']) !!}
                <div class="form-control-wrapper">
                    {!! Form::file('foto', ['class' => 'form-control']) !!}
                    {!! $errors->first('foto', '<div class="form-tooltip-error sm">:message</div>') !!}
                </div>
                <p class="small">*Untuk hasil yang maksimal, usahakan ukuran gambar adalah <b>300x400</b>px.</p>
            </fieldset>
        </div>
        @if(isset($edit))
        <div class="col-md-1">
            <img src="{{ asset("upload/juri/$edit->foto") }}" width="200px">
        </div>
        @endif
    </div>
</div>
        
