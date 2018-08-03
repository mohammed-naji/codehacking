@extends('layouts.admin')

@section('content')
    <h1>Create User</h1>
    <br />
    
    {!! Form::open(['method' => 'POST','action' => 'AdminUsersController@store', 'files' => true]) !!}
    
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => ' Name']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'autocomplete' => 'new-password']) !!}
        </div>

        <div class="form-froup">
            {!! Form::label('image', 'Image') !!}
            {!! Form::file('image', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id', [] + $roles, null, ['class' => 'form-control', 'placeholder' => 'Pick a user role..']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active', 'Status') !!}
            {!! Form::select('is_active', [1 => 'Active', 0 => 'Not Active'], 0, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create User', ['class' => 'btn btn-success']) !!}
        </div>
    
    {!! Form::close() !!}

    @if (count($errors) > 0)
    
        <div class="alert alert-danger">
            <ul>

                @foreach ($errors -> all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>
        </div>

    @endif
    

@endsection