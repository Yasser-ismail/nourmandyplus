<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{route('comments.store')}}" method="POST">
                    @include('backend.comments.form')
                    <button type="submit" class="btn btn-primary pull-right">Add Comment</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
