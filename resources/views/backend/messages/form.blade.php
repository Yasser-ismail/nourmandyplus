<div class="row">
    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Message Owner</label>
            <input type="text" name="name" disabled value="{{isset($row) ? $row->name : ''}}"
                   class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Owner Email</label>
            <input type="text" name="email" disabled value="{{isset($row) ? $row->email : ''}}"
                   class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Message</label>
            <textarea name="message" disabled class="form-control @error('message') is-invalid @enderror" cols="30"
                      rows="10">{{isset($row) ? $row->message : ''}}</textarea>
            @error('message')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
</div>
<hr>
<h4>Replay Message</h4>
<hr>
<form action="{{route('message.replay')}}" method="post">

    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$row->id}}">
    @if(Session::has('replied'))
        <div class="col-sm-12 form-group">
                <p class="text-success">{{session('replied')}}</p>
        </div>
    @endif
    <div class="col-sm-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Message</label>
            <textarea name="message" class="form-control @error('message') is-invalid @enderror" cols="30"
                      rows="10"></textarea>
            @error('message')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right">
        Replay</button>
    <div class="clearfix"></div>
</form>
