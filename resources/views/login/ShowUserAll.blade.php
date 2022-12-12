@extends('layouts/index')

@section('title')
    All User
@endsection

@section('content')
    @foreach($users as $user)
        <button type="button" class="btn btn-danger"><a href="{{url('/user/update',$user->id)}}">Edit</a></button>
        <button type="button" class="btn btn-success"><a href="{{url('/user/delete',$user->id)}}">delete</a></button>
        <p>{{$user->name}}</p>
<img src="{{asset($user->image)}}" class="img img-fluid"/>
        <hr/>
    @endforeach

@endsection
