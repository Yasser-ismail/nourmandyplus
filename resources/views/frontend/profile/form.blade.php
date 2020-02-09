<form action="{{route('profile.update')}}" style="display: none" method="post">
    {{csrf_field()}}

    <div class="card card-nav-tabs">
        <div class="card-header card-header-primary">
            Update Profile
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Username</label>
                        <input type="text" name="name" value="{{isset($user) ? $user->name : ''}}"
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
                        <input type="email" name="email" value="{{isset($user) ? $user->email : ''}}"
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
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                </div>
            </div>
        </div>

</form>

