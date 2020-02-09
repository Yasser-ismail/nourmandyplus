<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">theaters</i>
                </div>
                <p class="card-category">Videos</p>
                <h3 class="card-title">
                    {{\App\Models\Video::count()}}
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-warning"></i>
                    <a href="{{route('videos.index')}}" class="warning-link">All Videos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">content_paste</i>
                </div>
                <p class="card-category">Skills</p>
                <h3 class="card-title">{{\App\Models\Skill::count()}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons"></i>
                    <a href="{{route('skills.index')}}" class="warning-link">All Skills</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">category</i>
                </div>
                <p class="card-category">Categories</p>
                <h3 class="card-title">{{\App\Models\Category::count()}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons"></i>
                    <a href="{{route('categories.index')}}" class="warning-link">All Categories</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">question_answer</i>
                </div>
                <p class="card-category">Comments</p>
                <h3 class="card-title">{{\App\Models\Comment::count()}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons"></i>
                    <a href="{{route('videos.index')}}" class="warning-link">Check Videos</a>
                </div>
            </div>
        </div>
    </div>
</div>
