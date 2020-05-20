@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>List of Roles</h2></div>

                    <div class="card-body">
                        <a class="btn btn-primary float-right"  href="{{ route('role.create') }}">Create</a> <br><br>
                        @include('partials.message')

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Full Access</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <th scope="row">{{ $role->id }}</th>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->slug }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td>{{ $role['full-access'] }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-info" href="{{ route('role.show', $role->id) }}">Show</a></td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="{{ route('role.edit', $role->id) }}">Edit</a></td>
                                        <td>
                                            <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
