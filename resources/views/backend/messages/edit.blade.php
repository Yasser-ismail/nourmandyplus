@extends('backend.layouts.app')

@php $page_title = 'Contact Message' @endphp
@section('title')
    {{$page_title}}
@endsection


{{-- css --}}

@push('css')

@endpush

@section('content')


    @component('backend.layouts.navbar')

        @slot('nav_title')
            {{$page_title}}
        @endslot

    @endcomponent

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{$page_title}}</h4>
                            <p class="card-category">Here you can Reply to the next message</p>
                        </div>
                        <div class="card-body">
                            @include('backend.'.$routeName.'.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop


@push('js')


@endpush
