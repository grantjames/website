@extends('layouts.master')

@section('content')

	<h1>Create Category</h1>

	<form method="POST" action="{{route('admin.categories.store') }}">
		@include('admin.categories.form')

		<input type="submit" name="Create Category" class="btn">
	</form>

@endsection