@extends('layouts.master')

@section('content')

	<h1>Create Post</h1>

	<form method="POST" action="/admin/posts">
		@include('admin.posts.form')

		<input type="submit" name="Create Post" class="btn">
	</form>

@endsection