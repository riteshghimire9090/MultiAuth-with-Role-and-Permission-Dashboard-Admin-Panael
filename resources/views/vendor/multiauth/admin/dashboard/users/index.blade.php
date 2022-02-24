@extends('multiauth::admin.home')
@section('section-header')
    <div class="section-header">
        <h1>   Users List</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Admins</a></div>
            <div class="breadcrumb-item">All Users</div>
        </div>
    </div>

@endsection

@section("section-body")
    <div class="section-body">
        <h2 class="section-title">Users</h2>
        <p class="section-lead">
            You can manage all users, such as editing, deleting and more.
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
                        <h4>All User</h4>
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
                                    <th>Email</th>
                                    <th>Avatar</th>
                                    <th>Gender</th>
                                    {{--                                    <th>Created At</th>--}}
                                    <th>Status</th>
                                </tr>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" name="id[]" value="{{$user->id}}" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{$user->id}}">
                                                <label for="checkbox-{{$user->id}}" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>{{$user->name}}
                                            <div class="table-links">
                                                <a href="#">View</a>
                                                <div class="bullet"></div>
                                                <a href="{{route('admin.user.edit',[$user->id])}}">Edit</a>
                                                <div class="bullet"></div>
                                                <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();"class="text-danger">Trash</a>
                                                <form id="delete-form-{{ $user->id }}" action="{{ route('admin.user.delete',[$user->id]) }}" method="POST" style="display: none;">
                                                    @csrf @method('delete')
                                                </form>
                                            </div>

                                        </td>
                                        <td>{{$user->email}}

                                        </td>
                                        <td>
                                      <span class="badge  badge-pill">
                                          <img alt="image" src="{{url($user->avatar)}}" class="rounded-circle" width="35" data-toggle="title" title="">
</span>
                                        </td>
                                        <td>
                                            <span class="badge badge-success badge-pill">{{$user->gender->name}}
                                </span>
                                        </td>
                                        <td>
                                            <span class="badge @if($user->email_verified_at ==null) badge-danger @else badge-info @endif badge-pill">
                                                @if($user->email_verified_at ==null) Not Verified @else Verified @endif
                                            </span>

                                        </td>
                                    </tr>
                                @endforeach

                                @if($users->count()==0)
                                    <p>No {{ config('multiauth.prefix') }} created Yet, only super {{ config('multiauth.prefix') }} is available.</p>
                                @endif

                            </table>
                        </div>
                                                {{ $users->render("pagination::bootstrap-4") }}
                        <div class="float-right">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
