<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DetailController extends Controller
{
    public function show(){

        $id = request('id');
        $items = \App\NewsItem::all();
        return view('detail', ['id' => $id], ['newsitems' => $items]);
    }
}
