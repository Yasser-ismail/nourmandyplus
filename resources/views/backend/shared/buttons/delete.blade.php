<form action="{{route($routeName.'.destroy', $row)}}" method="post" style="display: inline-block">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="delete">
    <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove {{$smodule_name}}">
        <a href="{{route($routeName.'.destroy', $row)}}"><i class="material-icons">close</i></a>
    </button>
</form>
