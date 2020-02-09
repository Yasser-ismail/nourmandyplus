@extends('layouts.app')
@section('title', $video->name)

@section('meta_des', $video->meta_des)
@section('meta_keywords', $video->meta_keywords)

@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>{{$video->name}}</h1>
            </div>
            <div class="row">
                <div class="col-sm-12">

                    @php $videoId = getYoutubeEmbedUrl($video->youtube) @endphp
                    @if($videoId)

                        <iframe width="100%" height="500" src="https://www.youtube-nocookie.com/embed/{{$videoId}}"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe></div>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <p><i class="nc-icon nc-circle-10"></i> : {{$video->user->name}}</p>
                </div>
                <div class="col-sm-2">
                    <p><i class="nc-icon nc-calendar-60"></i> : {{$video->created_at->diffForHumans()}}</p>
                </div>
                <div class="col-sm-2">
                    <a href="{{route('front.category', $video->category->slug)}}"><i
                            class="nc-icon nc-single-copy-04"></i> : {{$video->category->name}}</a>
                </div>
                <div class="col-sm-3 text-left">
                    <strong>
                        <bold>SKILLS</bold>
                    </strong><br>
                    @if($video->skills)
                        @foreach($video->skills as $skill)
                            <a href="{{route('front.skill', $skill->slug)}}">
                                <button class="btn btn-sm btn-primary btn-round">{{$skill->name}}</button>
                            </a>
                        @endforeach
                    @endif
                </div>
                <div class="col-sm-3 text-left">
                    <strong>
                        <bold>TAGS</bold>
                    </strong><br>
                    @if($video->tags)
                        @foreach($video->tags as $tag)
                            <a href="{{route('front.tag', $tag->slug)}}">
                                <button class="btn btn-warning btn-sm btn-round">{{$tag->name}}</button>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row">
                <hr>
            </div>
            <div class="row">
                <div class="col-sm-12">


                    <div class="card card-nav-tabs">
                        <div class="card-header card-header-warning" id="comments">
                            <h4>Comments ({{count($video->comments)}})</h4>
                        </div>
                        <div class="card-body">
                            @if($video->comments)
                                @foreach($video->comments as $comment)
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h4 class="card-title"><i class="nc-icon nc-circle-10"></i>
                                                : <a href="{{route('front.profile', ['slug'=>$comment->user->slug])}}"><b>{{$comment->user->name}}</b></a></h4>
                                        </div>
                                        @if(Auth::user() == $comment->user)
                                            <div class="col-sm-4 text-right">
                                                <a href=""
                                                   onclick="$(this).parent().parent().next().next().slideToggle(1000); return false;">edit</a>
                                                |
                                                <a href="{{route('front.comment.delete', ['id'=>$comment->id])}}">delete</a>
                                            </div>
                                        @endif
                                    </div>
                                    <p class="card-text" style="margin: 20px 0px ;"><i
                                            class="nc-icon nc-chat-33"></i> {{$comment->body}}</p>
                                    <div style="display: none">
                                        @if(Auth::user())
                                            <form action="{{route('front.comment.edit', ['id'=> $comment->id])}}"
                                                  method="post">
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <input type="hidden" name="slug" value="{{$video->slug}}">
                                                    <input type="hidden" name="video_id" value="{{$video->id}}">
                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                    <textarea class="form-control" name="body" cols="100"
                                                              rows="1">{{$comment->body}}</textarea>
                                                </div>
                                                <div class="text-right">
                                                    <input type="submit" class="btn btn-primary btn-sm btn-round"
                                                           value="edit">
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                    <p class="card-text"><i class="nc-icon nc-calendar-60"></i>
                                        : {{$comment->created_at->diffForHumans()}}</p>
                                    @if(!$loop->last)
                                        <hr>
                                    @endif
                                @endforeach
                            @endif
                            @if(Auth::user())
                                <form action="{{route('front.comment.add')}}"
                                      method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="hidden" name="slug" value="{{$video->slug}}">
                                        <input type="hidden" name="video_id" value="{{$video->id}}">
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <textarea class="form-control" name="body" cols="100"
                                                  rows="1"></textarea>
                                    </div>
                                    <div class="text-right">
                                        <input type="submit" class="btn btn-primary btn-sm btn-round"
                                               value="add comment">
                                    </div>
                                </form>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
