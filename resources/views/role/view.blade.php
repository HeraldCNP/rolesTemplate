@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>View Role</h2></div>

                    <div class="card-body">
                        @include('partials.message')

                        <form method="POST" action="{{ route('role.update', $role->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="container">
                                <h3>Required Data</h3>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name', $role->name) }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ old('slug', $role->slug) }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Description</label>
                                    <textarea readonly class="form-control" name="description" id="description" cols="30" rows="3" placeholder="description" >{{ old('description', $role->description) }}</textarea>
                                </div>
                                <hr>
                                <h3>Full Access</h3>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input disabled type="radio" id="full-accessYes" name="full-access" class="custom-control-input" value="yes"
                                           @if($role['full-access'] == "yes")
                                           checked
                                           @elseif(old('full-access') == "yes")
                                           checked
                                        @endif
                                    >
                                    <label class="custom-control-label" for="full-accessYes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input disabled type="radio" id="full-accessNo" name="full-access"
                                           class="custom-control-input"
                                           value="no"
                                           @if($role['full-access'] == "no")
                                           checked
                                           @elseif(old('full-access') == "no")
                                           checked
                                        @endif
                                    >
                                    <label class="custom-control-label" for="full-accessNo">No</label>
                                </div>
                                <hr>
                                <h3>Permission List</h3>
                                @foreach($permissions as $permission)
                                    <div class="custom-control custom-checkbox">
                                        <input
                                            disabled
                                            type="checkbox"
                                            class="custom-control-input"
                                            id="permission_{{ $permission->id }}"
                                            value="{{ $permission->id }}"
                                            name="permission[]"
                                            @if(is_array(old('permission')) && in_array("$permission->id", old('permission')))
                                            checked
                                            @elseif(is_array($permission_role) && in_array("$permission->id",$permission_role ))
                                            checked
                                            @endif
                                        >
                                        <label class="custom-control-label" for="permission_{{ $permission->id }}">
                                            {{ $permission->id }}
                                            -
                                            {{ $permission->name }}
                                            <em>({{ $permission->description }} )</em>
                                        </label>
                                    </div>
                                @endforeach
                                <hr>
                                <a class="btn btn-success" href="{{ route('role.edit', $role->id) }}">Edit</a>
                                <a class="btn btn-danger" href="{{ route('role.index', $role->id) }}">Back</a>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
