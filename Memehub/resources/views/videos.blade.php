@extends('layouts.app')
@section('content')
    <main class="container">
    <h1>Videos</h1>
        <div class="container">
            <div class="row">
                @foreach($videos as $video)
                    <div class="col-sm-4 text-dark">
                    <a href="{{route('watch')}}?id={{$video['id']}}">
                        <img src="http://i3.ytimg.com/vi/{{$video['urlid']}}/hqdefault.jpg" width="95%" alt="">
                        <h4 class="text-dark">{{$video['title']}}</h4>
                        <p class="text-dark">{{$video['category']}}</p>
                    </a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection

