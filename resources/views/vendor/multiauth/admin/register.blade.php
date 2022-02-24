@extends('multiauth::admin.home')
@section('section-header')
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Profile</div>
        </div>
    </div>
@endsection
@section('section-body')
    <div class="section-body">
        <h2 class="section-title">Hi, {{auth("admin")->user()->name}}!</h2>
        <p class="section-lead">
            Change information about yourself on this page.
            @include('multiauth::message')

        </p>

        <div class="row mt-sm-4">

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form method="POST" action="{{ route('admin.register.new') }}" enctype="multipart/form-data">
                        <div class="card-header">
                            <h4>Register Admin</h4>
                        </div>
                        @method("post")

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group  col-md-7 col-12">
                                    <label>First Name</label>
                                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                           required autofocus>                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>

                            </div>
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-7 col-12">
                                    <label>Email</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                           required>
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                </div>
                                <div class="form-group col-md-7 col-12">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                           required>
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                </div>
                                <div class="form-group col-md-7 col-12">
                                    <label>Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                </div>

                                <div class="form-group col-md-7 col-12">
                                    <label for="profile_pic">Profile Picture</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input accept="image" type="file" value="0" name="avatar" class="custom-file-input" id="profile_pic">
                                            <label class="custom-file-label" for="profile_pic">Choose Your Profile Picture</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group col-md-7 col-12">
                                    <label>Select2</label>
                                    <select name="role_id[]" id="role_id" multiple class="form-control select2 {{ $errors->has('role_id') ? ' is-invalid' : '' }}">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>


                        </div>
                        <div class="card-footer text-left">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ route('admin.show') }}">
                                <button type="button"  class="btn btn-primary">Back</button>
                            </a>

                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
