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

            <fieldset class="form-group {{ $errors->has('jenis')?'form-group-error':'' }}">
                {!! Form::label('jenis', 'Jenis', ['class' => 'form-label']) !!}
                <div class="form-control-wrapper">
                    <div class="btn-group" data-toggle="buttons">
                        @foreach(kerjaSama() as $i => $temp)
                            <label class="btn">
                                {!! Form::radio('jenis', $i, null, ['id' => 'jenis'.$i]) !!}
                                {!! $temp !!}
                            </label>
                        @endforeach
                    </div>
                    {!! $errors->first('jenis', '<div class="form-tooltip-error sm">:message</div>') !!}
                </div>
            </fieldset>

            <fieldset class="form-group {{ $errors->has('url')?'form-group-error':'' }}">
                {!! Form::label('url', 'URL', ['class' => 'form-label']) !!}
                <div class="form-control-wrapper">
                    {!! Form::text('url', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('url', '<div class="form-tooltip-error sm">:message</div>') !!}
                </div>
            </fieldset>

        </div>

        <div class="col-md-{{ isset($edit) ? '4' : '6' }}">
            <fieldset class="form-group {{ $errors->has('logo')?'form-group-error':'' }}">
                {!! Form::label('logo', 'Logo', ['class' => 'form-label']) !!}
                <div class="form-control-wrapper">
                    {!! Form::file('logo', ['class' => 'form-control']) !!}
                    {!! $errors->first('logo', '<div class="form-tooltip-error sm">:message</div>') !!}
                </div>
                <p class="small">*Untuk hasil yang maksimal, usahakan ukuran gambar adalah <b>175x125</b>px.</p>
            </fieldset>
        </div>
        @if(isset($edit))
        <div class="col-md-1">
            <img src="{{ asset("upload/sponsor/$edit->logo") }}" width="200px">
        </div>
        @endif
    </div>
</div>
        
