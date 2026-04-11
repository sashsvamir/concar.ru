<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @hasSection('title') <title>@yield('title')</title> @endif
    @hasSection('meta-description') <meta name="description" content="@yield('meta-description')"> @endif
	@hasSection('meta-keywords') <meta name="keywords" content="@yield('meta-keywords')"> @endif

    <link rel="canonical" href="{{ url()->current() }}" />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">

</head>
<body class="{{ Route::currentRouteName() }}">



<div class="header">
	<div class="logo">
		<a href="{{ route('site-index', [], false) }}" title="Ремни Concar"><img src="{{ asset('img/logo.gif') }}" width="255" height="39" alt="logo concar.ru"></a>
	</div>

	<ul class="nav">
		<li><a href="https://intermehanika-ltd.ru">ООО Интермеханика ЛТД</a></li>
		<li><a href="https://intermehanika-ltd.ru/feedback">Форма запроса</a></li>
		<li><a href="{{ route('page-view', ['slug' => 'contacts'], false) }}">Контакты</a></li>
	</ul>
</div>


@yield('intro')


<div class="columns">

	<div class="column-left nav">
        @include('layouts.menu')
	</div>


	<div class="column-right content">
		@yield('content')
	</div>

</div>


@include('layouts.footer')


<div class="copy-block copy-st" style="font-size:11px;padding-bottom:10px;text-align:center;background:#ddd;">
    <span style="opacity:.4;">Разработка и продвижение сайта — <a href="https://shykin.ru" target="_blank">shykin.ru</a></span>
</div>

<script src="{{ mix('js/app.js') }}"></script>

@widget(\App\Widgets\FeedbackForm\Widget::class)


@stack('scripts')

@include('layouts.counters')

</body>
</html>
