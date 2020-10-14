@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Uploads</div>

                    <div class="card-body">
                        <!--Table-->
                        <table id="tablePreview" class="table">
                            <!--Table head-->
                            <tbody>
                            @foreach($uploads as $video)
                                <tr>
                                    <div class="col-sm-4 text-dark">
                                            <td> <a href="{{route('watch')}}?id={{$video['id']}}"><img src="http://i3.ytimg.com/vi/{{$video['urlid']}}/hqdefault.jpg" width="95%" alt=""></a></td>
                                            <td><h4 class="text-dark">{{$video['title']}}</h4>
                                                <p class="text-dark">{{$video['category']}} | ❤ {{$video['likes']}}</p></td>


                                    </div>
                                </tr>
                            @endforeach
                            </tbody>
                            <!--Table body-->
                        </table>
                        <!--Table-->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
