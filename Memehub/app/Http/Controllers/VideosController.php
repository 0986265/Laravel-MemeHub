<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\video_categories;
use App\Models\Videos;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function show(){
        $videos = Videos::all();
        return view('videos', ['videos' => $videos]);
    }

    public function upload(){

        $categories = video_categories::all();
        return view('uploadvideo', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required|active_url',
            'category' => 'required'
        ]);

        $video = new Videos();

        $videoID = explode("=",$request->get('url'));
        $video->urlid = $videoID[1];
        $video->title = $request->get('title');
        $video->url = $request->get('url');
        $video->category = $request->get('category');

        $video->save();

        return redirect('videos');

    }
}
