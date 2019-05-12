
# Installation


To install widget, you should compile `js` and `sass` sources with `laravel mix` and render it in view template.


Adding to `webpack.mix.js`:
```js
mix.js('app/Http/FeedbackFormWidget/src/feedback-form.js', 'public/js')
    .sass('app/Http/FeedbackFormWidget/src/feedback-form.sass', 'public/css');
```


Adding to view template:
```blade
<head>
    ...
    <link rel="stylesheet" type="text/css" href="{{ mix('css/feedback-form.css') }}">
    ...
</head>
...
<body>
    ...
    <?= (new \App\Http\FeedbackFormWidget\Widget())->run() ?>
    <script src="{{ mix('js/feedback-form.js') }}"></script>
</body>
```


Note: you can insert compiling `js` and `sass` sources with `mix` to common `app.js`, so that in this case you only needed call `Widget::run` in view template.
