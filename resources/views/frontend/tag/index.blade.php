@extends('layouts.app')
@section('title', $tag->name)
@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>{{$tag->name}}</h1>
            </div>
            <div class="row">
                @if($videos)
                    @foreach($videos as $video)
                        <div class="col-sm-4">
                            @include('frontend.shared.videocard')
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 offset-sm-5">
                {{$videos->render()}}
            </div>
        </div>
    </div>

@endsection
