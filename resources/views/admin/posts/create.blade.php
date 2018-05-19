@extends('layouts.master')

@section('content')

	<h1>Create Post</h1>

	<form method="POST" action="{{route('admin.posts.store') }}">
		@include('admin.posts.form')

		<input type="submit" name="Create Post" class="btn">
	</form>

@endsection