<?php

namespace App\Widgets\FeedbackForm;

use Arrilot\Widgets\AbstractWidget;

class Widget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'url' => 'https://intermehanika.ru/feedback/frame/index?referer=concar',
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function run()
    {
        if (env('APP_DEBUG') || in_array(env('APP_ENV'), ['local', 'test'])) {
            // not production mode
            $this->config['url'] = $this->url_dev;
        }

        return view('widgets.feedback_form', [
            'config' => $this->config,
        ]);
    }
}
