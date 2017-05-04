@extends('layouts.app')
@section('title','Edit Project')
@section('content')
<h1>修改案件</h1>
<!-- if there are creation errors, they will show here -->
{{ Form::model($project, array('route' => array('projects.update', $project->id), 'method' => 'PUT')) }}<div class="form-group">
  {{ Form::label('name', '案件名稱') }}
  {{ Form::text('name', null, array('class' => 'form-control', 'placeholder'=>'輸入案件名稱')) }}
</div>
<div class="form-group">
  {{ Form::label('description', '說明') }}
  {{ Form::textarea('description', null, array('class' => 'form-control', 'placeholder'=>'案件說明')) }}
</div>
{{ Form::submit('修改!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@endsection