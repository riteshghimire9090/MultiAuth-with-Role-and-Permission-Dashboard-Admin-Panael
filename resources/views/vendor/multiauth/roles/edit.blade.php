@extends('multiauth::admin.home')
@section('section-header')
    <div class="section-header">
        <h1>  Edit Role</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Admins</a></div>
            <div class="breadcrumb-item">Edit Role</div>
        </div>
    </div>
@endsection
@section('section-body')
    <div class="section-body">
        <h2 class="section-title">Hi, {{auth("admin")->user()->name}}!</h2>
        <p class="section-lead">
            Edit Role  on this page.
            @include('multiauth::message')

        </p>

        <div class="row mt-sm-4">

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                        @csrf @method('patch')
                        <div class="card-header">
                            <h4>Edit Role</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group  col-md-7 col-12">
                                    <label>Role Name</label>
                                    <input id="name" type="text" value="{{ $role->name }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                           required autofocus>                                    <div class="invalid-feedback">
                                        Please fill in the  name
                                    </div>
                                </div>

                            </div>
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
                                                               @if(in_array($permission->id,$role->permissions->pluck('id')->toArray()))
                                                               checked
                                                               @endif
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

@section('j')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit this Role</div>

                <div class="card-body">
                    <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                        @csrf @method('patch')
                        <div class="form-group">
                            <label for="role">Role Name</label>
                            <input type="text" value="{{ $role->name }}" name="name" class="form-control" id="role">
                        </div>
                        <div class="form-group">
                            <label for="role">Assign Permissions</label>
                            <div class="container">
                                @foreach($permissions as $key => $value)
                                <label for="role">{{$key}}</label>
                                <div class="d-flex justify-content-between">
                                    @foreach($value as $permission)
                                    <div class="form-group">
                                        <label for="{{$permission->id}}">{{$permission->name}}</label>
                                        <input type="checkbox" name="permissions[]" class="form-control"
                                            @if(in_array($permission->id,$role->permissions->pluck('id')->toArray()))
                                        checked
                                        @endif
                                        value="{{$permission->id}}" id="{{$permission->id}}">
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Change</button>
                        <a href="{{ route('admin.roles') }}" class="btn btn-danger btn-sm float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
