<table class="table" >
    <thead class=" text-primary">
    <th class="col-sm-8">Comments</th>
    <th class="text-right">Control</th>
    </thead>
    <tbody>
    @if(count($row->comments) > 0 )

        @foreach($row->comments as $comment)
                <tr>
                    <td class="col-sm-8"><h4>{{$comment->user->name}}</h4>
                        <p>{{$comment->body}}</p>
                        <span>{{$comment->created_at->diffForHumans()}}</span>
                    </td>

                    <td class="td-actions text-right col-sm-4 ">
                        <button type="button" rel="tooltip"  class="btn btn-white toggle-edit btn-link btn-sm "
                                data-original-title="Edit Comment">
                            <i class="material-icons">edit</i>
                        </button>

                        <form action="{{route('comments.destroy', $comment->id)}}" method="get"
                              style="display: inline-block;">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm"
                                    data-original-title="Remove Comment">
                                <i class="material-icons">close</i>
                            </button>
                        </form>
                    </td>


                    <td>
                        <br>
                        <hr>
                        <br>
                    </td>
                </tr>
                <tr style="display: none">
                    <td class="comment-edit" >@include('backend.comments.edit')</td>
                </tr>
        @endforeach

    @else
        <tr class="col-sm-12 text-center content-center">
            <td>No Comments</td>
        </tr>
    @endif
    </tbody>
</table>

