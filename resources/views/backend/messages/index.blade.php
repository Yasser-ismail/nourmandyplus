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

        @endslot
    @endcomponent
    <table class="table">
        <thead class=" text-primary">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th class="text-right">Control</th>
        </thead>
        <tbody>
        @if($rows)
            @foreach($rows as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->message}}</td>
                    <td class="td-actions text-right">
                        @include('backend.shared.buttons.edit')
                        @include('backend.shared.buttons.delete')
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop


@push('js')


@endpush
