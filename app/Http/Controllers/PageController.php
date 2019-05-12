<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return Response
     */
    public function __invoke(Request $request, $slug)
    {
        $model = Page::slug($slug)->active()->firstOrFail();

        return $this->responseFactory->view('/page/view', ['model' => $model]);
    }

}
