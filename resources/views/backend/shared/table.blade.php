<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-sm-8">
                                <h4 class="card-title ">{{$page_title}}</h4>
                                <p class="card-category">{{$page_des}}</p>
                            </div>
                            {{$add_user}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{$slot}}
                            <div class="content-center col-sm-6 offset-sm-5">
                                {{$rows->render()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
