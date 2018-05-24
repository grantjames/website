@extends('layouts.master')

@section('content')

	<h1 class="admin-page-header">Tags <small>Create new tags by adding them to a post</small></h1>

	<form method="POST" action="{{ route('admin.tags.store') }}">
		@include('admin.tags.form')

		<input type="submit" name="Create new tag">
	</form>

	<table>
		<tr>
			<th>Tag</th>
			<th>Post count</th>
			<th></th>
		</tr>
		@foreach($tags as $tag)
			<tr>
				<td><a href="{{ route('admin.tags.edit', $tag->id) }}">{{ $tag->name }}</a></td>
				<td>{{ $tag->posts->count() }}</td>
				<td>
					<form method="post" action="{{ route('admin.tags.destroy', $tag->id) }}" onsubmit="return confirm('Are you sure you want to delete this tag?')">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" value="Delete">
					</form>
				</td>
			</tr>
		@endforeach
	</table>

@endsection