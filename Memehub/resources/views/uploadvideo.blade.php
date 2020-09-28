@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>Upload Video</h1>

    <form action="{{route('store.post')}}" method="post">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <label for="url">URL</label>
        <input type="text" name="url" id="url">
        <input type="submit" value="Publish">
    </form>
    </div>
@endsection

