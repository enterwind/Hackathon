@extends('laravel2step::layouts.app')

@section('title')
    {{ trans('laravel2step::laravel-verification.exceededTitle') }}
@endsection

@section('content')
<style type="text/css">
    #app {
        height: 100vh;
        background: url('{{ asset('upload/'.landing()->header_image) }}');
        background-size: cover;
    }
    .logo_home {
        width: 200px
    }
</style>

<div class="container top_bar" >
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <img src="{{ asset('img/logo_home.png') }}" alt="Logo Hackathon Samarinda" class="logo_home"/>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel verification-exceeded-panel">
                <div class="panel-heading text-center">
                    <i class="glyphicon glyphicon-lock locked-icon text-danger" aria-hidden="true"></i>
                    <h3>
                        {{ trans('laravel2step::laravel-verification.exceededTitle') }}
                    </h3>
                </div>
                <div class="panel-body">
                    <h4 class="text-center text-danger">
                        {!! trans('laravel2step::laravel-verification.lockedUntil') !!}
                        <br /><br/>
                        <strong>
                            {{ $timeUntilUnlock }}
                        </strong>
                        <br /><br/>
                        <small>
                            {{ trans('laravel2step::laravel-verification.tryAgainIn') }} {{ str_replace('hours', 'jam', $timeCountdownUnlock) }} &hellip;
                        </small>
                    </h4>
                    <p class="text-center">
                        <a class="btn btn-success" href="{{ route('landing.team.logout') }}" tabindex="6">
                            <i class="glyphicon glyphicon-home" aria-hidden="true"></i> {{ trans('laravel2step::laravel-verification.returnButton') }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
