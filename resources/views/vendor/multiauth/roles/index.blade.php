@extends('multiauth::admin.home')
@section('section-header')
    <div class="section-header">
        <h1>   Roles List</h1>
        @permitTo('CreateRole')

        <div class="section-header-button">
            <a href="{{ route('admin.role.create') }}" class="btn btn-primary">Add  Role </a>
        </div>
        @endpermitTo
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Admins</a></div>
            <div class="breadcrumb-item">Add Role</div>
        </div>
    </div>

@endsection

@section("section-body")
    <div class="section-body">
        <h2 class="section-title">Roles</h2>
        <p class="section-lead">
            You can manage all role, such as editing, deleting and more.
        </p>

        {{--        <div class="row">--}}
        {{--            <div class="col-12">--}}
        {{--                <div class="card mb-0">--}}
        {{--                    <div class="card-body">--}}
        {{--                        <ul class="nav nav-pills">--}}
        {{--                            <li class="nav-item">--}}
        {{--                                <a class="nav-link active" href="#">All <span class="badge badge-white">5</span></a>--}}
        {{--                            </li>--}}
        {{--                            <li class="nav-item">--}}
        {{--                                <a class="nav-link" href="#">Draft <span class="badge badge-primary">1</span></a>--}}
        {{--                            </li>--}}
        {{--                            <li class="nav-item">--}}
        {{--                                <a class="nav-link" href="#">Pending <span class="badge badge-primary">1</span></a>--}}
        {{--                            </li>--}}
        {{--                            <li class="nav-item">--}}
        {{--                                <a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a>--}}
        {{--                            </li>--}}
        {{--                        </ul>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        @include('multiauth::message')

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Role</h4>
                    </div>
                    <div class="card-body">


                        <div class="clearfix mb-3"></div>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th class="text-center pt-2">
                                        <div class="custom-checkbox custom-checkbox-table custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>Admins</th>
                                    <th>Permissions</th>
{{--                                    <th>Created At</th>--}}
                                    <th>Status</th>
                                </tr>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" name="id[]" value="{{$role->id}}" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{$role->id}}">
                                                <label for="checkbox-{{$role->id}}" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>{{$role->name}}

                                        </td>
                                        <td>
                                      <span class="badge badge-primary badge-pill">{{ $role->admins->count() }} {{
                                ucfirst(config('multiauth.prefix')) }}</span>
                                        </td>
                                        <td>
                                            <span class="badge badge-warning badge-pill">{{ $role->permissions->count() }}
                                Permissions</span>
                                        </td>
                                        <td>
                                            @permitTo('DeleteRole,UpdateRole')
                                            <a href="" class="btn btn-sm btn-danger mr-3"
                                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">Delete</a>
                                            <form id="delete-form-{{ $role->id }}"
                                                  action="{{ route('admin.role.delete',$role->id) }}" method="POST"
                                                  style="display: none;">
                                                @csrf @method('delete')
                                            </form>
                                            @endpermitTo

                                            @permitTo('UpdateRole')
                                            <a href="{{ route('admin.role.edit',$role->id) }}"
                                               class="btn btn-sm btn-primary mr-3">Edit</a>
                                            @endpermitTo
                                        </td>
                                    </tr>
                                @endforeach
                                @if($roles->count()==0)
                                    <p>No {{ config('multiauth.prefix') }} created Yet, only super {{ config('multiauth.prefix') }} is available.</p>
                                @endif

                            </table>
                        </div>
{{--                        {{ $roles->render("pagination::bootstrap-4") }}--}}
                        <div class="float-right">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
