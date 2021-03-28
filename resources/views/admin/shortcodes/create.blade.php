@extends('layouts.master')

@section('content')

	<h1>Create Shortcode</h1>

	<form method="POST" action="{{route('admin.shortcodes.store') }}">
		@include('admin.shortcodes.form')

		<input type="submit" name="Create Shortcode" class="btn">
	</form>

@endsection