@extends('admin.main')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Category Control Page</h1>

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="">View all categories</a></li>
        <li><a href="category/create">Create new category</a></li>
    </ul>
</nav>

@if(count($categories) > 0)
<div class="panel panel-default">

    <div class="panel-heading">
        All Categories
    </div>

    <div class="panel-body">
        <table class="table table-striped task-table">

            <thead>
                <th> Category</th>
                <th>&nbsp;</th>
            </thead>

            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>
                        <div>
                            {!! $category->name !!}
                        </div>
                    </td>
                    <td>
                        <a href="{!! url('category/' . $category->id . '/edit')  !!}">
                            Edit
                        </a>
                    </td>
                    <td><button class="btn btn-danger">Delete</button></td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>
@endif

@endsection