@extends('layouts.app')
@section('content')
    <main class="container">
            <iframe src="https://www.youtube.com/embed/{{$video['urlid']}}?autoplay=1&modestbranding=1&color=white" height="720" width="1080"  frameborder="0"></iframe>
            <h1>{{$video['title']}}</h1>
    </main>
@endsection
