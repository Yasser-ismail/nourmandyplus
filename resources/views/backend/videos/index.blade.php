@extends('backend.layouts.app')

@section('title')
    {{$page_title}}
@endsection


{{-- css --}}

@push('css')

@endpush

@section('content')

    {{--Nav-Bar--}}
    @component('backend.layouts.navbar')

        @slot('nav_title')
            {{$page_title}}
        @endslot
    @endcomponent

    {{--Table--}}

    @component('backend.shared.table', ['page_title'=>$page_title, 'page_des'=>$page_des, 'rows'=>$rows, 'smodule_name'=>$smodule_name, 'routeName'=>$routeName])

        @slot('add_user')
            <div class="col-sm-4 text-right">
                <a href="{{route($routeName.'.create')}}" class="btn btn-white btn-round">ADD {{$smodule_name}}</a>
            </div>
        @endslot
    @endcomponent
    <table class="table">
        <thead class=" text-primary">
        <th>ID</th>
        <th>Name</th>
        <th>Owner</th>
        <th>Category</th>
        <th>Skills</th>
        <th>Tags</th>
        <th class="text-center">Published</th>

        <th class="text-right">Control</th>
        </thead>
        <tbody>
        @foreach($rows as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->user->name}}</td>
                <td>{{$row->category->name}}</td>
                <td>
                    @if($row->skills)
                        @foreach($row->skills as $skill)
                                {{$skill->name . '   '}}
                        @endforeach
                    @endif
                </td>
                <td>
                    @if($row->tags)
                        @foreach($row->tags as $tag)
                            {{$tag->name . '   '}}
                        @endforeach
                    @endif

                </td>
                <td class="text-center">@if($row->published == 1)  <i class="fa fa-check text-success"></i> @else <i class="fa fa-times text-danger"></i>@endif</td>
                <td class="td-actions text-right">
                    @include('backend.shared.buttons.edit')
                    @include('backend.shared.buttons.delete')
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop


@push('js')


@endpush
