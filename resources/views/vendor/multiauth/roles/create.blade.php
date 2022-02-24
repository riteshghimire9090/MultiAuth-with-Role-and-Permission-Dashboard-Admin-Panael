@extends('multiauth::admin.home')
@section('section-header')
    <div class="section-header">
        <h1>  Create Role</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Admins</a></div>
            <div class="breadcrumb-item">Create Role</div>
        </div>
    </div>
@endsection
@section('section-body')
    <div class="section-body">
        <h2 class="section-title">Hi, {{auth("admin")->user()->name}}!</h2>
        <p class="section-lead">
            Create Role  on this page.
            @include('multiauth::message')

        </p>

        <div class="row mt-sm-4">

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{ route('admin.role.store') }}" method="post">
                        <div class="card-header">
                            <h4>Create Role</h4>
                        </div>
                        @method("post")

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group  col-md-7 col-12">
                                    <label>Role Name</label>
                                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                           required autofocus>                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>

                            </div>
                            @csrf
                            <div class="row">

                            <div class="form-group    col-md-7 col-12">
                                <label for="role">Assign Permissions</label>
                                <div class="container">
                                    @foreach($permissions as $key => $value)
                                        <label for="role">{{$key}}</label>
                                        <div class="d-flex justify-content-between">
                                            @foreach($value as $permission)
                                                <div class="form-group">
                                                    <label for="{{$permission->id}}">{{$permission->name}}</label>
                                                    <input type="checkbox" name="permissions[]" class="form-control"
                                                           value="{{$permission->id}}" id="{{$permission->id}}">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            </div>



                        </div>
                        <div class="card-footer text-left">
                            <button type="submit" class="btn btn-primary">Create Role</button>
                            <a href="{{ route('admin.roles') }}">
                                <button type="button"  class="btn btn-primary">Back</button>
                            </a>

                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
