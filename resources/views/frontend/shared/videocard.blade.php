<div class="card" style="width: 20rem;">
    <a href="{{route('front.video', $slug = $video->slug)}}"><img class="card-img-top " src="{{$video->image}}" style="width: 100%; height:200px; " alt="Card image cap"></a>
    <div class="card-body">
        <a href="{{route('front.video', $slug = $video->slug)}}"><p class="card-text">{{$video->name}}</p></a>
        <small>{{$video->created_at->diffForHumans()}}</small>
    </div>
</div>
