<div class="mobile-menu-left-overlay"></div>
<ul class="main-nav nav nav-inline">
	<li class="nav-item">
		<a class="nav-link @yield('mBeranda')" href="{{ route('epanel.index') }}">
			<i class="font-icon font-icon-speed"></i> &nbsp;
			Beranda
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link @yield('mFaq')" href="{{ route('epanel.faq.index') }}">
			<i class="font-icon font-icon-help"></i> &nbsp;
			FAQ
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link @yield('mJuri')" href="{{ route('epanel.juri.index') }}">
			<i class="font-icon font-icon-user"></i> &nbsp;
			Juri
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link @yield('mPeriode')" href="{{ route('epanel.periode.index') }}">
			<i class="font-icon font-icon-event"></i> &nbsp;
			Periode
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link @yield('mPersyaratan')" href="{{ route('epanel.persyaratan.index') }}">
			<i class="font-icon font-icon-ok"></i> &nbsp;
			Persyaratan
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link @yield('mPrize')" href="{{ route('epanel.prize.index') }}">
			<i class="font-icon font-icon-award"></i> &nbsp;
			Prize
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link @yield('mProcedure')" href="{{ route('epanel.procedure.index') }}">
			<i class="font-icon font-icon-list-square"></i> &nbsp;
			Procedure
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link @yield('mSponsor')" href="{{ route('epanel.sponsor.index') }}">
			<i class="font-icon font-icon-star"></i> &nbsp;
			Sponsor
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link @yield('mTutorial')" href="{{ route('epanel.tutorial.index') }}">
			<i class="font-icon font-icon-learn"></i> &nbsp;
			Tutorial
		</a>
	</li>
</ul>