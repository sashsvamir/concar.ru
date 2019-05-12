<?php

namespace App\Http\FeedbackFormWidget;


/**
 * Feedback form widget
 */
class Widget
{
    /**
     * @var string
     */
	public $url;

    /**
     * @var string
     */
	public $url_prod = 'https://intermehanika.ru/feedback/frame/index?referer=concar';

    /**
     * @var string
     */
	public $url_dev = 'http://shop/feedback/frame/index?referer=concar';

    /**
     * @var string
     */
	public $class = 'modal-feedback-control';

	/**
	 * Initialization
	 */
	public function init()
	{
		if (env('APP_DEBUG') || in_array(env('APP_ENV'), ['local', 'test'])) {
			$this->url = $this->url_dev;
		} else {
			$this->url = $this->url_prod;
		}
	}

	/**
	 * Render widget
	 */
	public function run() : string
	{
		$this->init();
		// register assets js, css and etc
		// $this->getView()->registerAssetBundle(FeedbackFormAsset::class);

		$result = '
			<div class="' . $this->class . '" data-url="' . $this->url . '">
				<span class="button">Запрос</span>
			</div>
		';

		return $result;
	}

}
