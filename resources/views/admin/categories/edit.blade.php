@extends('layouts.master')

@section('content')

	<h1>Edit category: {{ $category->name }}</h1>

	<form method="POST" action="/admin/categories/{{ $category->id }}">
		{{ method_field('PATCH') }}
		@include('admin.categories.form')

		<input type="submit" name="Edit category">
	</form>

@endsection