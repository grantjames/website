@extends('layouts.master')

@section('content')

	<h1>Edit post: {{ $post->title }}</h1>

	<form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
		{{ method_field('PATCH') }}
		@include('admin.posts.form')

		<input type="submit" name="Update post" class="btn">
	</form>

@endsection