@extends('layouts.master')

@section('content')

	<h1 class="admin-page-header">Categories <a href="{{ route('admin.categories.create') }}" class="btn btn__small m__lm">Create new category</a></h1>

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
							<input type="submit" value="Delete" class="btn btn__small">
						</form>
					@endif
				</td>
			</tr>
		@endforeach
	</table>

@endsection