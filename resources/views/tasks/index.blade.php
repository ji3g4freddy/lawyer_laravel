@extends('layouts.app')
@section('title','Homepage')
@section('content')
<h1>時數報表</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>日期</td>
            <td>工作項目</td>
            <td>工作說明</td>
            <td>工作時數</td>
            <td>動作</td>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->date }}</td>
            <td>{{ $task->category }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->hour }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the task (uses the show method found at GET /tasks/{id} -->
                <!-- <a class="btn btn-small btn-success" href="{{ URL::to('tasks/' . $task->id) }}">細節</a> -->
                <!-- edit this task (uses the edit method found at GET /tasks/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('tasks/' . $task->id . '/edit') }}">修改</a>
                <!-- delete the task (uses the destroy method DESTROY /tasks/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'tasks/' . $task->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('刪除', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a class="btn btn-small btn-info" href="{{ URL::to('excel/') }}">輸出Excel報表</a> 
@endsection