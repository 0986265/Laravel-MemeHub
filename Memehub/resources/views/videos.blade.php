@extends('layouts.app')
@section('content')
    <main class="container">
    <h1>Videos</h1>
    <div class="container mt-3">
    @foreach($videos as $video)
        <a href="{{route('watch')}}?id={{$video['id']}}">
            <h2>{{$video['title']}}</h2>

        </a>
<hr>
    @endforeach
    </div>
    </main>
@endsection

