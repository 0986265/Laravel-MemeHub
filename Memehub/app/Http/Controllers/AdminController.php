<?php

namespace App\Http\Controllers;
use App\Models\Videos;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function videostatus(Request $request)
    {
        $status = $request->get( 'status' );

        if($status == 'active') {

            $status = 'inactive';
        } else {
            $status = 'active';
        }
        $id = $request->get( 'id' );

        Videos::where('id', '=', $id)->update(['status' => $status]);

        $videos = Videos::all();
        foreach ($videos as $video) {
            if ($video['id'] == $id) {
                return view('watch', ['id' => $id], ['video' => $video]);
            }
        }
    }

    public function admin()
    {
        return view('admin');
    }
}
