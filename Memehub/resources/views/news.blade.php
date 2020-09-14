@extends('layout.layout')
@section('content')
    <h1>News</h1>

    @foreach($newsitems as $item)
        <a href="{{route('detail')}}?id={{$item['id']}}">{{$item['title']}}</a><br>
    @endforeach
@endsection

