@extends('layouts.app')
@section('title', 'Post Details')
@section('content')
<h1>Showing {{ $post->title }}</h1>
<div class="jumbotron text-center">
	<h2>{{ $post->title }}</h2>
	<p>
		<strong>Content:</strong> {{ $post->content }}<br>
		<strong>Date:</strong> {{ $post->created_at }}
	</p>
</div>
@endsection