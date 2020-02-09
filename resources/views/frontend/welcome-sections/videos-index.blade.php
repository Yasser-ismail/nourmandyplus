<div class="section landing-section">

</div>
<hr>
<div class="section">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-8 ml-auto mr-auto">
                <h2 class="title">Latest Videos</h2>
                <h5 class="description">Keep Learning, latest videos based on published day</h5>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="section section-buttons">
                <div class="container">
                    <div class="row">
                        @foreach($videos as $video)
                            <div class="col-sm-4">
                                @include('frontend.shared.videocard')
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row text-center">
            <div class="col-sm-12">
                <a href="{{route('home')}}" class="btn btn-danger btn-round">More Videos</a>
            </div>
        </div>
    </div>
</div>
<hr>
