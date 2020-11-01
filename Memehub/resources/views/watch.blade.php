@extends('layouts.app')
@section('content')
    <main class="container">
        <iframe src="https://www.youtube.com/embed/{{$video['urlid']}}?autoplay=1&modestbranding=1&color=white"
                height="720" width="1080" frameborder="0"></iframe>
        <table id="tablePreview" class="table table-sm table-borderless">
            <tbody>
            <tr>
                <th><h2>{{$video['title']}}</h2></th>
                @guest
                    {{-- GUEST ONLY --}}
                @else
                    {{-- LOGED IN USERS ONLY --}}

                    @if( Auth::user()->type == "admin" )
                        <td>
                            <form action="{{route('admin.videostatus')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$video['id']}}">
                                @if($video['status'] == 'active')
                                    <input type="hidden" name="status" value="active">
                                    <button type="submit" class="btn btn-success">Active</button>
                                @else
                                    <input type="hidden" name="status" value="inactive">
                                    <button type="submit" class="btn btn-secondary">Inactive</button>
                                @endif
                            </form>
                        </td>
                    @endif
                    <form action="{{route('like')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$video['id']}}">
                        @if($count >= 1)
                            <td><button type="button" class="btn btn-danger">❤  {{$video['likes']}}</button></td>
                        @else
                            <td><button type="submit" class="btn btn-light">❤  {{$video['likes']}}</button></td>
                        @endif
                    </form>
                @endguest


            </tr>
            </tbody>
        </table>
    </main>
@endsection
