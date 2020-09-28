<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function show(){
        $videos = Videos::all();
        return view('videos', ['videos' => $videos]);
    }

    public function upload(){

        return view('uploadvideo');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required|active_url'
        ]);

        $video = new Videos();
        $video->title = $request->get('title');
        $video->url = $request->get('url');

        $video->save();

        return redirect('videos');

    }
}
