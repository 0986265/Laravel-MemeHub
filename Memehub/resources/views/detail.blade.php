@extends('layout.layout')
@section('content')
    @foreach($newsitems as $item)
        @if($item['id']==$id   )
        <h1>{{$item['title']}}</h1>
        <p>{{$item['description']}}</p>
        <img src="{{$item['image']}}" alt="">
        @endif
    @endforeach
@endsection
