<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Latest Comments</h4>
                <p class="card-category">Here you can see the latest comments in the website</p>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning">
                    <tr>
                        <th>ID</th>
                        <th>Owner</th>
                        <th>Video</th>
                        <th>Comment</th>
                        <th>Created_at</th>
                        <th class="text-right">Control</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td><a href="{{route('users.edit', ['id'=>$comment->user->id])}}">{{$comment->user->name}}</a></td>
                                <td><a href="{{route('videos.edit', ['id'=>$comment->video->id])}}">{{$comment->video->name}}</a></td>
                                <td>{{$comment->body}}</td>
                                <td>{{$comment->created_at->diffForHumans()}}</td>
                                <td class="text-right">
                                    <form action="{{route('dashboard.comment', $comment->id)}}" method="get" style="display: inline-block;">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm"
                                                data-original-title="Remove Comment">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-sm-5 offset-sm-5">
                    {{$comments->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
