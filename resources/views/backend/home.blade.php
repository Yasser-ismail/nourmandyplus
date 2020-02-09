@extends('backend.layouts.app')
@section('title')
    HomePage
@endsection

@section('content')


    @component('backend.layouts.navbar')

        @slot('nav_title')
            Home Page
        @endslot

    @endcomponent

    @include('backend.home-sections.statistics')
    @include('backend.home-sections.latest-comments')

@endsection


@push('js')

    <script>
    </script>

@endpush
