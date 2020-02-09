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
                            <form action="{{route($routeName.'.update', $row->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="patch">
                                @include('backend.'.$routeName.'.form')
                                <button type="submit" class="btn btn-primary pull-right">
                                    Update {{$module_name}}</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">

                        @php $videoId = getYoutubeEmbedUrl($row->youtube) @endphp
                        @if($videoId)

                            <iframe width="100%" height="250" src="https://www.youtube-nocookie.com/embed/{{$videoId}}"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe></div>
                    @endif
                    <input type="image" class="embed-responsive" style="width: 100%; height: 250px"
                           src="{{$row->image}}" alt="">
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card" id="comments">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Video Comments</h4>
                                <p class="card-category">Here you can edit \ Delete Video Comments</p>
                            </div>
                            <div class="card-body">
                                @include('backend.comments.index')
                            </div>
                        </div>
                    </div>
                </div>
                    @include('backend.comments.create')

            </div>
        </div>
    </div>



@stop


@push('js')
    <script !src="">
        $('.toggle-edit').click(function() {
            $(this).closest("tr").next().slideToggle('slow');
        });


    </script>
@endpush
