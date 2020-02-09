@extends('layouts.app')
@section('title', $category->name)

@section('meta_des', $category->meta_des)
@section('meta_keywords', $category->meta_keywords)


@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>{{$category->name}}</h1>
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
