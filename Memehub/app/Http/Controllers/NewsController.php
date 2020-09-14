<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class NewsController extends Controller
{
    public function show(){

        $items = \App\NewsItem::all();
        return view('news', ['newsitems' => $items]);
    }
}
