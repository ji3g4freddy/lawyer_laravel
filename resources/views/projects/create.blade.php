@extends('layouts.app')
@section('title','New Project')
@section('content')
<h1>建立案件</h1>
<!-- if there are creation errors, they will show here -->
<!-- 
<form method="POST" action="{{ url('/projects') }}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="name">案件名稱</label>
    <input type='text' class="form-control" id="name" placeholder="輸入案件名稱" />
  </div>
  <div class="form-group">
    <label for="description">說明</label>
    <textarea class="form-control" id="description" rows="5" placeholder="案件說明"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">登記</button>
</form> -->
{{ Form::open(array('url' => 'projects')) }}
<div class="form-group">
  {{ Form::label('name', '案件名稱') }}
  {{ Form::text('name', '', array('class' => 'form-control', 'placeholder'=>'輸入案件名稱')) }}
</div>
<div class="form-group">
  {{ Form::label('description', '說明') }}
  {{ Form::textarea('description', '', array('class' => 'form-control', 'placeholder'=>'案件說明')) }}
</div>
{{ Form::submit('建立!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@endsection