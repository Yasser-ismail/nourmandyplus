@extends('layouts.app')
@section('title', 'home')
@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>Latest Videos</h1>
                @if(request()->has('search') && request()->get('search') != '')
                    <p>You are searched on <b>{{request()->get('search')}}</b></p>
                @endif
            </div>
            <div class="row">
                @foreach($videos as $video)
                    <div class="col-sm-4">
                        @include('frontend.shared.videocard')
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 offset-sm-5">
                {{$videos->render()}}
            </div>
        </div>
    </div>

@endsection
