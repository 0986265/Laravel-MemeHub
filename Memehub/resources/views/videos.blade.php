@extends('layouts.app')
@section('content')
    <main class="container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Videos</h1>
                    <form action="{{route('videos.search')}}" method="POST" role="search">
                        @csrf
                        <div class="input-group my-3">
                            <input type="text" name="searchterm" class="form-control" placeholder="Search...">
                            <select id="category" name="catogory">
                                <option value="All">All</option>
                                <option value="break" disabled>---</option>
                                @foreach($categories as $catogory)
                                    <option value="{{$catogory['name']}}">{{$catogory['name']}}</option>
                                @endforeach
                            </select>
                                <button type="submit" class="btn btn-primary">Zoeken<span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </form>


                </div>
            </div>
        </div>


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

