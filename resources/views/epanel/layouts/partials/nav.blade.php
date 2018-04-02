<header class="site-header">
    <div class="container-fluid">
        <a href="{!! route('epanel.index') !!}" class="site-logo">
            <img class="hidden-sm-down" src="{{ asset('img/logo.png') }}" alt="">
        </a>

        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>

        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{!! Avatar::create(auth()->user()->nama)->toBase64() !!}">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" href="{{ route('epanel.profile') }}">
                            	<span class="font-icon glyphicon glyphicon-user"></span>
                            	Profil
                            </a>
                            <a class="dropdown-item" href="{{ route('epanel.password') }}">
                                <span class="font-icon fa fa-unlock"></span>
                                Ubah Password
                            </a>
                            <a class="dropdown-item" href="{{ route('epanel.setting') }}">
                            	<span class="font-icon glyphicon glyphicon-cog"></span>
                            	Pengaturan
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('epanel.logout') }}">
                            	<span class="font-icon fa fa-times"></span>
                            	Keluar
                            </a>
                        </div>
                    </div>
                    <button type="button" class="burger-right">
                        <i class="font-icon-menu-addl"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>