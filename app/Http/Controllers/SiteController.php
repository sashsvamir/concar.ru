<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class SiteController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        return $this->responseFactory->view('/site/index');
    }

}
