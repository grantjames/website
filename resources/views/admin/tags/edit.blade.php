@extends('layouts.master')

@section('content')

	<h1>Edit tag: {{ $tag->name }}</h1>

	<form method="POST" action="/admin/tags/{{ $tag->id }}">
		{{ method_field('PATCH') }}
		@include('admin.tags.form')

		<input type="submit" name="Edit tag">
	</form>

@endsection