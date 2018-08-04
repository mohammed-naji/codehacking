@extends('layouts.admin')

@section('content')
<h1>Create Post</h1>
<br />
    
    {!! Form::open(['method' => 'POST','action' => 'AdminPostsController@store', 'files' => true]) !!}
    
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => ' Title']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category') !!}
            {!! Form::select('category_id', [] + $categories, null, ['class' => 'form-control', 'placeholder' => 'Pick a category..']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('body', 'Body') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => ' Body']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Image') !!}
            {!! Form::file('photo_id', ['class' => 'form-control']) !!}
        </div>

        {{--  <div class="form-group">
            {!! Form::label('user_id', 'User') !!}
            {!! Form::select('user_id', [] , null, ['class' => 'form-control', 'placeholder' => 'Pick a user..']) !!}
        </div>  --}}

        <div class="form-group">
            {!! Form::submit('Create Post', ['class' => 'btn btn-success']) !!}
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