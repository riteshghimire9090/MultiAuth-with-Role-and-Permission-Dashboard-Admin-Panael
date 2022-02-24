@extends('multiauth::admin.home')
@section('section-header')
    <div class="section-header">
        <h1>Edit
{{--            {{$admin->name}}--}}
        </h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Edit
{{--                {{$admin->name}}--}}
            </div>
        </div>
    </div>
@endsection
@section('section-body')

    <div class="section-body">
        <h2 class="section-title">Hi, {{auth("admin")->user()->name}}!</h2>
        <p class="section-lead">
            Change information about
{{--            {{$admin->name}}--}}
            on this page.
            @include('multiauth::message')

        </p>

        <div class="row mt-sm-4">

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form method="POST" action="{{route('admin.user.update',[$user->id])}}"  enctype="multipart/form-data">
                        <div class="card-header">
                            <h4>Edit details of {{$user->name}}</h4>
                        </div>
                        @method("patch")

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group  col-md-7 col-12">
                                    <label>First Name</label>
                                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}"
                                           required autofocus>                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>

                            </div>
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-7 col-12">
                                    <label>Email</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}"
                                           required>
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
                                    <label>Assign Role</label>
                                    <select name="gender_id" id="gender_id" multiple class="form-control select2 {{ $errors->has('gender_id') ? ' is-invalid' : '' }}">
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}"
                                                    @if ($gender->id==$user->gender->id)
                                                    selected
                                                @endif >{{ $gender->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-7 col-12">
                                    {{--                                    <div class="control-label">Active</div>--}}
                                    <span class="custom-switch-description">Status:{{ $user->status ? '':'Blocked' }}</span>


                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" value="1" {{ $user->status ? 'checked':'' }} name="status" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                    </label>

                                </div>
                                <div class="form-group col-md-7 col-12">
                                    {{--                                    <div class="control-label">Active</div>--}}
                                    <span class="custom-switch-description">Verified:</span>


                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" value="1" {{ $user->email_verified_at !=null ? 'checked':'' }} name="email_verified_at" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                    </label>

                                </div>



                            </div>


                        </div>
                        <div class="card-footer text-left">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            {{--                            <a href="{{ route('admin.show') }}">--}}
                            {{--                                <button type="button"  class="btn btn-primary">Back</button>--}}
                            {{--                            </a>--}}

                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
