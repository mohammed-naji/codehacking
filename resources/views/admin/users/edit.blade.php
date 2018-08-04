@extends('layouts.admin')

@section('content')
    <h1>Edit User</h1>
    <br />

    <div class="col-sm-9">

        {!! Form::model($user, ['method' => 'PATCH','action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}
        
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => ' Name']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'autocomplete' => 'new-password']) !!}
            </div>

            <div class="form-froup">
                {!! Form::label('photo_id', 'Image') !!}
                {!! Form::file('photo_id', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('role_id', [] + $roles, null, ['class' => 'form-control', 'placeholder' => 'Pick a user role..']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status') !!}
                {!! Form::select('is_active', [1 => 'Active', 0 => 'Not Active'], null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class' => 'btn btn-success']) !!}
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
    </div>

    <div class="col-sm-3">
        <img class="img-responsive" src="{{url('/')}}{{ $user->photo ? $user->photo->file : '' }}" alt="">
    </div>

@endsection