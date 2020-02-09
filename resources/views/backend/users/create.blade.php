@extends('backend.layouts.app')

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
                            <p class="card-category">{{$page_des}}</p>
                        </div>
                        <div class="card-body">
                            <form action="{{route($routeName.'.store')}}" method="POST">
                                @include('backend.'.$routeName.'.form')
                                <button type="submit" class="btn btn-primary pull-right">Add {{$module_name}}</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop


@push('js')


@endpush
