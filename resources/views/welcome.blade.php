@extends('layouts.app')
@section('title', 'Normandyplus.com')
@section('header')
    @include('frontend.welcome-sections.header')
@endsection

@section('content')

    <div class="main">
        @include('frontend.welcome-sections.videos-index')
        @include('frontend.welcome-sections.statistics')
        @include('frontend.welcome-sections.contact-us')
    </div>
@endsection
