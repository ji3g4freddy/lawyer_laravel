@extends('layouts.app')
@section('title','New Task')
@section('content')
<h1>時數登記</h1>
<!-- if there are creation errors, they will show here -->
<!-- 
<form method="POST" action="{{ url('/tasks') }}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="title">日期</label>
    <input type='date' class="form-control" name="date" id="date" placeholder="選擇日期" />
  </div>
  <div class="form-group">
    <label for="category">工作項目</label>
    <select name="category" class="form-control" id="category">
      <option value="0">請選擇</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
  </div>
  <div class="form-group">
    <label for="hour">時數</label>
    <input type="text" class="form-control" name="hour" id="hour" placeholder="工作時數">
  </div>
  <div class="form-group">
    <label for="description">說明</label>
    <textarea class="form-control" name="description" id="description" rows="5" placeholder="工作內容說明"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">登記</button>
</form> -->
{{ Form::open(array('url' => 'tasks')) }}
<div class="form-group">
  {{ Form::label('date', '日期') }}
  {{ Form::date('date', '', array('class' => 'form-control', 'placeholder'=>'選擇日期')) }}
</div>
<div class="form-group">
  {{ Form::label('category', '工作項目') }}
  {{ Form::select('category', array('L' => 'Large', 'S' => 'Small')) }}
</div>
<div class="form-group">
  {{ Form::label('hour', '時數') }}
  {{ Form::number('hour', '', array('class' => 'form-control', 'placeholder'=>'工作時數')) }}
</div>
<div class="form-group">
  {{ Form::label('description', '說明') }}
  {{ Form::textarea('description', '', array('class' => 'form-control', 'placeholder'=>'工作內容說明')) }}
</div>
{{ Form::submit('登記!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@endsection