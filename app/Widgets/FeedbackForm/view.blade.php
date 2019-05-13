
@if ($config['withAssets'])
    <link rel="stylesheet" type="text/css" href="{{ mix('css/feedback-form.css') }}">
@endif

<div class="{{ $config['class'] }}" data-url="{{ $config['url'] }}">
    <span class="button">Запрос</span>
</div>


@if ($config['withAssets'])
    <script src="{{ mix('js/feedback-form.js') }}"></script>
@endif
