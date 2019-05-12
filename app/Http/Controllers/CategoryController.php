<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return Response
     */
    public function __invoke(Request $request, $slug)
    {
        // TODO: remove this debug lines:
        // $query = Category::slug($slug)->getQuery();
        // $query = $query->toSql();

        $model = Category::slug($slug)->firstOrFail();

        return $this->responseFactory->view('/category/view', ['model' => $model]);
    }

}
