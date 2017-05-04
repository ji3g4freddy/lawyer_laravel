@extends('layouts.app')
@section('title','New Project')
@section('content')

<h1>{{$project->name}}</h1>


<h4>已加入案件</h4>
@foreach ($assign as $ass)
	<p>{{$ass->name}}</p>
@endforeach

<h3>加入新律師</h3>

<form method="POST" action="{{ url('/projects/'.$project->id) }}">
  {{ csrf_field() }}
@foreach ($users as $user)
  <input tabindex="1" type="checkbox" name="user_id[]" id="{{$user}}" value="{{$user->id}}" >{{$user->name}}
@endforeach
<br/>
  <!-- 
<div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" name="user_id[]" value="1">
      option1
    </label>
  </div>-->

<button type="submit" class="btn btn-primary">指派</button>
</form>

@endsection