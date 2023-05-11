<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestapiController extends Controller
{
    public function __invoke()
    {
        return response(['text' => '成功拿到囉!']);
    }
}
