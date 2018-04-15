<?php

namespace App\Controllers;

class ArticleController extends Controller
{
    public function get($id)
    {
        return $this->response->withStatus(404);
        die('get');
    }

    public function put($id)
    {
        die('put');
    }
}
