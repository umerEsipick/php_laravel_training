@extends('admin.main')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Create New Category</h1>

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="">View all categories</a></li>
        <li><a href="category/create">Create new category</a></li>
    </ul>
</nav>

@if(Session::has('category_create'))
<div class="alert alert-success">
    <em>{!! session('category_create') !!}</em>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>

<div>
    {!! Form::open(array('url'=>'category')) !!}

    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, array('class'=>'form-control')) !!}

    {!! Form::submit('Create Category', array('class'=>'secondary-cart-btn')) !!}

    {!! Form::close() !!}
</div>

@endsection