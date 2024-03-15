<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    protected $modelName;

    public function __construct()
    {
        $this->modelName = '';
    }

    public function getModelName()
    {
        return $this->modelName;
    }
}
