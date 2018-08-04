@extends('layouts.admin')

@section('content')
<table class="table">

    <h1>Users</h1>
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Photo</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Satus</th>
        <th scope="col">Created</th>
        {{--  <th scope="col">Updated</th>  --}}
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @if ($users)
            @foreach ($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <th><img height="50" src="{{ url('/') }}{{ $user->photo ? $user->photo->file : '/images/default.png '}}" alt=""></th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    {{--  <td>{{ $user->updated_at->diffForHumans() }}</td>  --}}
                    <td>
                        {!! Form::open(['method' => 'DELETE','action' => ['AdminUsersController@destroy', $user->id]]) !!}
                            <a class="btn btn-info btn-sm" href="{{route('users.edit', $user->id)}}"><i class="fa fa-edit"></i></a>
                            <button type="submit" onclick="return confirm('are you sure?!')" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
@endsection