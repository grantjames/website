@extends('layouts.master')

@section('content')

	<p>
		<a href="/admin/posts/create">Create new post</a>
	</p>

	@if( ! empty($unpublished))
		<h2>Unpublished</h2>
		<table class="table">
			<tr>
				<th>Title</th>
				<th>Publish date</th>
				<th></th>
			</tr>
			@foreach($unpublished as $post)
				<tr>
					<td>
						<a href="/admin/posts/{{ $post->id }}/edit">{{ $post->title }}</a>
					</td>
					<td>{{ $post->published_at ? $post->published_at->toFormattedDateString() : 'Never' }}</td>
					<td>
						<form method="post" action="/admin/posts/{{ $post->id }}" onsubmit="return confirm('Are you sure you want to delete this post?')">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" value="Delete">
						</form>
					</td>
				</tr>
			@endforeach
		</table>
	@endif

	@if( ! empty($published))
		<h2>Published</h2>
		<table class="table">
			<tr>
				<th>Title</th>
				<th>Publish date</th>
				<th></th>
			</tr>
			@foreach($published as $post)
				<tr>
					<td>
						<a href="/admin/posts/{{ $post->id }}/edit">{{ $post->title }}</a>
					</td>
					<td>{{ $post->published_at->toFormattedDateString() }}</td>
					<td>
						<form method="post" action="/admin/posts/{{ $post->id }}" onsubmit="return confirm('Are you sure you want to delete this post?')">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" value="Delete">
						</form>
					</td>
				</tr>
			@endforeach
		</table>
		

		{{ $published->links() }}
	@endif

@endsection