@extends('multiauth::admin.home')
@section('section-header')
    <div class="section-header">
        <h1>  {{ ucfirst(config('multiauth.prefix')) }} List</h1>
        <div class="section-header-button">
            <a href="{{route('admin.register')}}" class="btn btn-primary">Add New {{ ucfirst(config('multiauth.prefix')) }}</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Admins</a></div>
            <div class="breadcrumb-item">All Admin</div>
        </div>
    </div>
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}

{{--                    <span class="float-right">--}}
{{--                        <a href="" class="btn btn-sm btn-success"></a>--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--    @include('multiauth::message')--}}
{{--                    <ul class="list-group">--}}
{{--                        @foreach ($admins as $admin)--}}
{{--                        <li class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--                            {{ $admin->name }}--}}
{{--                            <span class="badge">--}}
{{--                                    @foreach ($admin->roles as $role)--}}
{{--                                        <span class="badge-warning badge-pill ml-2">--}}
{{--                                            {{ $role->name }}--}}
{{--                                        </span> @endforeach--}}
{{--                            </span>--}}
{{--                            {{ $admin->active? 'Active' : 'Inactive' }}--}}
{{--                            <div class="float-right">--}}
{{--                                <a href="#" class="btn btn-sm btn-secondary mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">Delete</a>--}}
{{--                                <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">--}}
{{--                                    @csrf @method('delete')--}}
{{--                                </form>--}}

{{--                                <a href="{{route('admin.edit',[$admin->id])}}" class="btn btn-sm btn-primary mr-3">Edit</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        @endforeach @if($admins->count()==0)--}}
{{--                        <p>No {{ config('multiauth.prefix') }} created Yet, only super {{ config('multiauth.prefix') }} is available.</p>--}}
{{--                        @endif--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection

@section("section-body")
    <div class="section-body">
        <h2 class="section-title">{{ ucfirst(config('multiauth.prefix')) }}</h2>
        <p class="section-lead">
            You can manage all {{ ucfirst(config('multiauth.prefix')) }}, such as editing, deleting and more.
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
                        <h4>All {{ ucfirst(config('multiauth.prefix')) }}</h4>
                    </div>
                    <div class="card-body">
{{--                        <div class="float-left">--}}
{{--                            <select class="form-control selectric">--}}
{{--                                <option>Action For Selected</option>--}}
{{--                                <option>Move to Draft</option>--}}
{{--                                <option>Move to Pending</option>--}}
{{--                                <option>Delete Pemanently</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="float-right">--}}
{{--                            <form>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control" placeholder="Search">--}}
{{--                                    <div class="input-group-append">--}}
{{--                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}

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
                                    <th>Roles</th>
                                    <th>Avatar</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                </tr>
                                @foreach ($admins as $admin)
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                            <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>{{$admin->name}}
                                        <div class="table-links">
                                            <a href="#">View</a>
                                            <div class="bullet"></div>
                                            <a href="{{route('admin.edit',[$admin->id])}}">Edit</a>
                                            <div class="bullet"></div>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();"class="text-danger">Trash</a>
                                            <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">
                                                @csrf @method('delete')
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                      <span class="badge">
                                    @foreach ($admin->roles as $role)
                                              <span class="badge-warning badge-pill ml-2">
                                            {{ $role->name }}
                                        </span> @endforeach
                            </span>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img alt="image" src="{{url($admin->avatar)}}" class="rounded-circle" width="35" data-toggle="title" title="">
                                        </a>
                                    </td>
                                    <td>{{$admin->created_at}}</td>
                                    <td><div class="badge badge-primary">                            {{ $admin->active? 'Active' : 'Inactive' }}
                                        </div></td>
                                </tr>
                                @endforeach @if($admins->count()==0)
                                    <p>No {{ config('multiauth.prefix') }} created Yet, only super {{ config('multiauth.prefix') }} is available.</p>
                                @endif

                            </table>
                        </div>
                        {{ $admins->render("pagination::bootstrap-4") }}
                        <div class="float-right">

{{--                            <nav>--}}
{{--                                <ul class="pagination">--}}
{{--                                    --}}

{{--                                    --}}{{--                                    <li class="page-item disabled">--}}
{{--                                        <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                            <span aria-hidden="true">&laquo;</span>--}}
{{--                                            <span class="sr-only">Previous</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="page-item active">--}}
{{--                                        <a class="page-link" href="#">1</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="page-item">--}}
{{--                                        <a class="page-link" href="#">2</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="page-item">--}}
{{--                                        <a class="page-link" href="#">3</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="page-item">--}}
{{--                                        <a class="page-link" href="#" aria-label="Next">--}}
{{--                                            <span aria-hidden="true">&raquo;</span>--}}
{{--                                            <span class="sr-only">Next</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </nav>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
