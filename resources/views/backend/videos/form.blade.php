{{csrf_field()}}
@if(Auth::user())
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
@endif

<div class="row">
    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Name</label>
            <input type="text" name="name" value="{{isset($row) ? $row->name : ''}}"
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
            <label class="bmd-label-floating">Meta Keywords</label>
            <input type="text" name="meta_keywords" value="{{isset($row) ? $row->meta_keywords : ''}}"
                   class="form-control @error('meta_keywords') is-invalid @enderror">
            @error('meta_keywords')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Youtube Link</label>
            <input type="text" name="youtube" value="{{isset($row) ? $row->youtube : ''}}"
                   class="form-control @error('youtube') is-invalid @enderror">
            @error('youtube')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Description</label>
            <textarea name="des"  class="form-control @error('des') is-invalid @enderror" cols="30" rows="5">{{isset($row) ? $row->des : ''}}</textarea>
            @error('des')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Description</label>
            <textarea name="meta_des"  class="form-control @error('meta_des') is-invalid @enderror" cols="30" rows="5">{{isset($row) ? $row->meta_des : ''}}</textarea>
            @error('meta_des')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Category</label>
            <select name="category_id"  class="form-control dropdown-dark @error('category_id') is-invalid @enderror" >
                <option disabled {{isset($row->category_id) ? '' : 'selected'}}>Choose Category</option>
                <option disabled>ــــــــــــــــــــــــــــــــــــ</option>
                @if($categories)
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{isset($row->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                @endif
            </select>

            @error('category_id')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Status</label>
            <select name="published" class="form-control dropdown-dark @error('status') is-invalid @enderror">
                <option disabled {{isset($row->category_id) ? '' : 'selected'}}>Choose Status</option>
                <option disabled>ــــــــــــــــــــــــــــــــــــ</option>
                <option value="1" {{isset($row->published) && $row->published == 1 ? 'selected' : ''}}>Published</option>
                <option value="0" {{isset($row->published) && $row->published == 0 ? 'selected' : ''}}>Not Published</option>

            </select>

            @error('status')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>


    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Skills</label>
            <select name="skill_id[]" multiple style="height: 100px; " class="form-control mdb-select md-form @error('skill_id[]') is-invalid @enderror" >
                <option disabled >Choose Skills</option>
                <option disabled>ــــــــــــــــــــــــــــــــــــ</option>
                @if($skills)
                    @foreach($skills as $skill)
                        <option value="{{$skill->id}}"
                        @if(isset($row->skills))
                            @foreach($row->skills as $skilll)
                                {{$skilll->id == $skill->id ? 'selected' : ''}}
                                @endforeach
                            @endif
                        >{{$skill->name}}</option>
                    @endforeach
                @endif
            </select>

            @error('skill_id[]')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Tags</label>
            <select name="tags_id[]" multiple style="height: 100px; " class="form-control mdb-select md-form @error('tags_id[]') is-invalid @enderror" >
                <option disabled >Choose Tags</option>
                <option disabled>ــــــــــــــــــــــــــــــــــــ</option>
                @if($tags)
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}"
                        @if(isset($row->tags))
                            @foreach($row->tags as $selected_tag)
                                {{$selected_tag->id == $tag->id ? 'selected' : ''}}
                                @endforeach
                            @endif
                        >{{$tag->name}}</option>
                    @endforeach
                @endif
            </select>

            @error('tags_id[]')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Image</label>
            <input type="file" style="position: initial" name="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>


</div>
