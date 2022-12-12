@extends('layouts/index')

@section('title')
{{$user->name}}
@endsection

@section('content')
    <button type="button" class="btn btn-danger"><a href="{{url('/user/update',$user->id)}}">Edit</a></button>
    <button type="button" class="btn btn-success"><a href="{{url('/user/delete',$user->id)}}">delete</a></button>
<h1>{{$user->name}}</h1>

<div>
<img src="{{asset($user->image)}}" class="img img-fluid"/>
</div>

@endsection
