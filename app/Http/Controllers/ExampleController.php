<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Classes\LineService;
use Illuminate\Http\Request;


class ExampleController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function bot() {
        $line = new LineService();
        $line->callMessage();
    }

    public function respondMessage(Request $request) {
        dd($request->all());
    }
}
