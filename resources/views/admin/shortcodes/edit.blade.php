@extends('layouts.master')

@section('content')

	<h1>Edit shortcode: {{ $shortcode->name }}</h1>

	<p>
		<strong>Warning: changing the shortcode value will stop it from working in any posts where it is currently in use.</strong>
	</p>
	
	<form method="POST" action="{{ route('admin.shortcodes.update', $shortcode->id) }}">
		{{ method_field('PATCH') }}
		@include('admin.shortcodes.form')

		<input type="submit" name="Edit shortcode" class="btn">
	</form>

@endsection