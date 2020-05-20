@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Create Role</h2></div>

                    <div class="card-body">
                        @include('partials.message')

                            <form method="POST" action="{{ route('role.store') }}">
                                @csrf
                                <div class="container">
                                    <h3>Required Data</h3>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ old('slug') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Description</label>
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="3" placeholder="description" >{{ old('description') }}</textarea>
                                    </div>
                                    <hr>
                                    <h3>Full Access</h3>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="full-accessYes" name="full-access" class="custom-control-input" value="yes"
                                        @if(old('full-access') == "yes")>
                                        checked
                                        @endif
                                        >
                                        <label class="custom-control-label" for="full-accessYes">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="full-accessNo" name="full-access" class="custom-control-input" value="no"
                                        @if(old('full-access') == "no")
                                            checked
                                        @endif
                                               @if(old('full-access') === null)
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
                                                type="checkbox"
                                                class="custom-control-input"
                                                id="permission_{{ $permission->id }}"
                                                value="{{ $permission->id }}"
                                                name="permission[]"
                                                @if(is_array(old('permission')) && in_array("$permission->id", old('permission')))
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
                                    <input class="btn btn-primary" type="submit" value="Save">


                                </div>

                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
