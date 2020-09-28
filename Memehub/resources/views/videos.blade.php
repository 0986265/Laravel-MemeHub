@extends('layouts.app')
@section('content')
    <main class="container">
    <h1>Videos</h1>
    <div class="container mt-3">
    @foreach($videos ?? '' as $video)
{{--        <a href="{{route('detail')}}?id={{$video['id']}}">--}}
            <h2>{{$video['title']}}</h2>
            <a href="{{$video['url']}}">{{$video['url']}}</a>
{{--        </a>--}}
<hr>
    @endforeach
    </div>
    </main>
@endsection

