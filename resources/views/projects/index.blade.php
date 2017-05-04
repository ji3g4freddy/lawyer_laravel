@extends('layouts.app')
@section('title','Homepage')
@section('content')
<h1>現有案件</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>案件名稱</td>
            <td>案件說明</td>
            <td>動作</td>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{ $project->name }}</td>
            <td>{{ $project->description }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the project (uses the show method found at GET /projects/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('projects/' . $project->id .'/assign') }}">指派</a>
                <!-- edit this project (uses the edit method found at GET /projects/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('projects/' . $project->id . '/edit') }}">修改</a>
                <!-- delete the project (uses the destroy method DESTROY /projects/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'projects/' . $project->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('刪除', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection