<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\UserLikes;
use App\Models\video_categories;
use App\Models\Videos;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function show(){
        //Get all videos from database with status active
        $videos = Videos::where('status','LIKE','active')->get();

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
        $catogory = $request->get( 'catogory' );

        if($catogory == 'All') {
            $videos = Videos::where('status','LIKE','active')->where('title','LIKE','%'.$searchterm.'%')->get();
        } else {
            $videos = Videos::where('status','LIKE','active')->where('title','LIKE','%'.$searchterm.'%')->where('category','LIKE','%'.$catogory.'%')->get();
        }

        $categories = video_categories::all();

        if(count($videos) > 0) {
            return view('videos', ['videos' => $videos],['categories' => $categories]);
        } else {
            return view('videos', ['videos' => $videos],['categories' => $categories])->withMessage();
        }
    }

    public function upload(){
        $userid = \Auth::id();
        $count = count(UserLikes::where('userid', 'LIKE', $userid)->get());
        $categories = video_categories::all();
        if($count >= 3) {
            return view('uploadvideo', ['categories' => $categories]);
        } else {
            return view('error');
        }
    }

    public function myuploads(){

        $user = \Auth::id();

        $uploads = Videos::where('user','LIKE', $user)->get();
        return view('myuploads', ['uploads' => $uploads]);
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
        $video->status = 'active';
        $video->user = \Auth::id();

        $video->save();

        return redirect('videos');

    }
}
