{{csrf_field()}}
<div class="row">
    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Username</label>
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
            <label class="bmd-label-floating">Email address</label>
            <input type="email" name="email" value="{{isset($row) ? $row->email : ''}}"
                   class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Role</label>
            <select name="group" class="form-control dropdown-dark @error('group') is-invalid @enderror">
                <option disabled {{isset($row->group) ? '' : 'selected'}}>Choose Role</option>
                <option disabled>ــــــــــــــــــــــــــــــــــــ</option>
                <option value="administrator" {{isset($row->group) && $row->group == 'administrator' ? 'selected' : ''}}>administrator</option>
                <option value="user" {{isset($row->group) && $row->group == 'user' ? 'selected' : ''}}>user</option>
            </select>

            @error('group')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

</div>
