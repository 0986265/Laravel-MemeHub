@extends('layouts.app')
@section('content')
    <h1>Videos</h1>

    @foreach($videos ?? '' as $video)
{{--        <a href="{{route('detail')}}?id={{$video['id']}}">--}}
            <h2>{{$video['title']}}</h2>
            <a href="{{$video['url']}}">{{$video['url']}}</a>
{{--        </a>--}}
<br>
    @endforeach
@endsection

