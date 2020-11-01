<?php

namespace App\Http\Controllers;

use App\Models\UserLikes;
use App\Models\Videos;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;

class WatchController extends Controller
{
    public function show()
    {
        $id = request('id');
        $userid = \Auth::id();
        $videos = Videos::all();

        foreach ($videos as $video) {
            if ($video['id'] == $id) {
                $count = count(UserLikes::where('userid', 'LIKE', $userid)->where('videoid', 'LIKE', $id)->get());
                return view('watch', ['id' => $id, 'video' => $video, 'count' => $count]);
            }
        }
    }

    public function like(Request $request)
    {
        $id = $request->get('id');
        $userid = \Auth::id();
        $currentVideo = Videos::where('id', 'LIKE', $id)->get();

        $count = count(UserLikes::where('userid', 'LIKE', $userid)->where('videoid', 'LIKE', $id)->get());

        $currentLikes = $currentVideo[0]['likes'];
        $currentLikes = $currentLikes + 1;

        Videos::where('id', 'LIKE', $id)->update(['likes' => $currentLikes]);

        $userLikes = new UserLikes();
        $userLikes->userid = \Auth::id();
        $userLikes->videoid = $id;
        $userLikes->save();

        $videos = Videos::all();

        foreach ($videos as $video) {
            if ($video['id'] == $id) {
                return view('watch', ['id' => $id, 'video' => $video, 'count' => $count]);
            }
        }
    }
}
