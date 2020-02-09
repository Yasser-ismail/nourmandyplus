{{csrf_field()}}
<input type="hidden" name="user_id" @if(Auth::user())value="{{Auth::user()->id}}"@endif>
<input type="hidden" name="video_id" value="{{$row->id}}">

        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Comment</label>
            <input type="text" name="body" value="{{isset($comment) ? $comment->body : ''}}"
                   class="form-control @error('body') is-invalid @enderror">
            @error('body')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
