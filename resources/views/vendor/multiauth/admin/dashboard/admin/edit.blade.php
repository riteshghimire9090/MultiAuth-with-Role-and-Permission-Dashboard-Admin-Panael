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
                    <form method="post" enctype="multipart/form-data" action="{{route('admin.updateProfile',[auth("admin")->user()->id])}}" class="needs-validation" >
{{--                                                <img height="50" alt="image" src="{{url(auth("admin")->user()->avatar)}}" class="rounded-circle profile-widget-picture">--}}

                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-7 col-12">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ auth("admin")->user()->name }}" required="">
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>

                            </div>
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-7 col-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" disabled name="email" value="{{ auth("admin")->user()->email }}" required="">
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
                            </div>


                        </div>
                        <div class="card-footer text-left">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
