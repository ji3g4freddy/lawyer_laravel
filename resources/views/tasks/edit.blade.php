@extends('layouts.app')
@section('title','Edit Task')
@section('content')
<h1>修改登記內容</h1>
<!-- if there are creation errors, they will show here -->
{{ Form::model($task, array('route' => array('tasks.update', $task->id), 'method' => 'PUT')) }}
<div class="form-group">
  {{ Form::label('date', '日期') }}
  {{ Form::date('date', null, array('class' => 'form-control', 'placeholder'=>'選擇日期')) }}
</div>
<div class="form-group">
  {{ Form::label('category', '工作項目') }}
  {{ Form::select('category', array('L' => 'Large', 'S' => 'Small')) }}
</div>
<div class="form-group">
  {{ Form::label('hour', '時數') }}
  {{ Form::number('hour', null, array('class' => 'form-control', 'placeholder'=>'工作時數')) }}
</div>
<div class="form-group">
  {{ Form::label('description', '說明') }}
  {{ Form::textarea('description', null, array('class' => 'form-control', 'placeholder'=>'工作內容說明')) }}
</div>
{{ Form::submit('修改!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@endsection