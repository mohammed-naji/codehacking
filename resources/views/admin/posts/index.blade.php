@extends('layouts.admin')

@section('content')
<table class="table">

    <h1>Posts</h1>
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Photo</th>
        <th scope="col">title</th>
        <th scope="col">Body</th>
        <th scope="col">Category</th>
        <th scope="col">User</th>
        <th scope="col">Created</th>
        {{--  <th scope="col">Updated</th>  --}}
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @if ($posts)
            @foreach ($posts as $post)
                <tr>
                    <th>{{ $post->id }}</th>
                    <th><img height="50" src="{{ url('/') }}{{ $post->photo ? $post->photo->file : '/images/default.png '}}" alt=""></th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->category ? $post->category->name : 'Uncategories'}}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    {{--  <td>{{ $user->updated_at->diffForHumans() }}</td>  --}}
                    <td>
                        {!! Form::open(['method' => 'DELETE','action' => ['AdminUsersController@destroy', $post->id]]) !!}
                            <a class="btn btn-info btn-sm" href="{{route('posts.edit', $post->id)}}"><i class="fa fa-edit"></i></a>
                            <button type="submit" onclick="return confirm('are you sure?!')" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
@endsection