@extends('layouts.master')

@section('content')

	<h1>Categories</h1>

	<form method="POST" action="{{ route('admin.categories.store') }}">
		@include('admin.categories.form')

		<input type="submit" name="Create new category">
	</form>

	<table class="table">
		<tr>
			<th>Category</th>
			<th>Post count</th>
			<th></th>
		</tr>
		@foreach($categories as $category)
			<tr>
				<td><a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name }}</a></td>
				<td>{{ $category->posts->count() }}</td>
				<td>
					@if($category->posts->count() == 0)
						<form method="post" action="{{ route('admin.categories.destroy', $category->id) }}" onsubmit="return confirm('Are you sure you want to delete this category?')">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" value="Delete">
						</form>
					@endif
				</td>
			</tr>
		@endforeach
	</table>

@endsection