<?php

namespace App\Widgets\FeedbackForm;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\View;


class Widget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'url' => 'https://intermehanika-ltd.ru/feedback/frame/index?referer=concar',
        'class' => 'modal-feedback-control',
        'withAssets' => true,
    ];

    /**
     * Url of frame content in development env
     *
     * @var string
     */
    public $url_dev = 'http://shop/feedback/frame/index?referer=concar';

    /**
     * Treat this method as a controller action.
     *
     * Return view() or other content to display.
     * @return \Illuminate\Contracts\View\View
     */
    public function run()
    {
        if (env('APP_DEBUG') || in_array(env('APP_ENV'), ['local', 'test'])) {
            // if not production mode
            $this->config['url'] = $this->url_dev;
        }

        return View::file(__DIR__ . DIRECTORY_SEPARATOR . 'view.blade.php', [
            'config' => $this->config,
        ]);
    }
}
