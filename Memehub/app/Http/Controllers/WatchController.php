<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class WatchController extends Controller
{
    public function show()
    {
        $id = request('id');

        $videos = Videos::all();
        foreach ($videos as $video) {
            if ($video['id'] == $id) {
                return view('watch', ['id' => $id], ['video' => $video]);
            }
        }
    }
}
