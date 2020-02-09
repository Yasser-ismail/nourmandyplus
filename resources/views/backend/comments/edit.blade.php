<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{route('comments.update', $comment->id)}}" method="get">
                        <input type="hidden" name="_method" value="patch">
                        @include('backend.comments.form')
                        <button type="submit" class="btn btn-primary pull-right">
                            Update Comment
                        </button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
