<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\video_categories;
use App\Models\Videos;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function show(){
        //Get all videos from database
        $videos = Videos::all();

        //Select 6 videos to show on main page
        $loadedvideos = array();

        for ($n = 0; $n < 6; $n++) {
            $r = rand(0, count($videos) - 1);
            $loadedvideos[$n] = $videos[$r];
        }

        $categories = video_categories::all();

        return view('videos', ['videos' => $loadedvideos],['categories' => $categories]);
    }

    public function search(Request $request){
        $searchterm = $request->get( 'searchterm' );

        $videos = Videos::where('title','LIKE','%'.$searchterm.'%')->get();
        $categories = video_categories::all();

        if(count($videos) > 0) {
            return view('videos', ['videos' => $videos],['categories' => $categories]);
        } else {
            dd('ERROR');
        }
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
