@extends('admin.main')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Post Control Page</h1>

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="">View all posts</a></li>
        <li><a href="post/create">Create new post</a></li>
    </ul>
</nav>

@if(Session::has('post_create'))
<div class="alert alert-success">
    <em>{!! session('post_create') !!}</em>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
@endif

@endsection