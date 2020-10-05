@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>Upload Video</h1>
        @if ($errors->any())
            <div class="alert">
                <h2>ERROR</h2>
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="{{route('store.post')}}" method="post">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <label for="url">URL</label>
        <input type="text" name="url" id="url">
        <label for="category">Category</label>
        <select id="category" name="category">
            @foreach($categories as $catogory)
                <option value="{{$catogory['name']}}">{{$catogory['name']}}</option>
            @endforeach
        </select>
        <hr>
        <input type="submit" value="Publish">
    </form>
    </div>
@endsection

