@extends('layouts.master')

@section('content')

	<h1 class="admin-page-header">Posts <a href="{{ route('admin.posts.create') }}" class="btn btn__small m__lm">Create new post</a></h1>

	@if($unpublished->isNotEmpty())
		<h2>Unpublished</h2>
		<table class="table">
			<tr>
				<th>Title</th>
				<th>Publish date</th>
				<th></th>
			</tr>
			@foreach($unpublished as $unpub_post)
				<tr>
					<td>
						<a href="{{ route('admin.posts.edit', $unpub_post->id) }}">{{ $unpub_post->title }}</a>
					</td>
					<td>{{ $unpub_post->published_at ? $unpub_post->published_at->toFormattedDateString() : 'Never' }}</td>
					<td>
						<form method="post" action="{{ route('admin.posts.destroy', $unpub_post->id) }}" onsubmit="return confirm('Are you sure you want to delete this post?')">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" value="Delete" class="btn btn__small">
						</form>
					</td>
				</tr>
			@endforeach
		</table>
	@endif

	@if($published->isNotEmpty())
		<h2>Published</h2>
		<table class="table">
			<tr>
				<th>Title</th>
				<th>Publish date</th>
				<th></th>
			</tr>
			@foreach($published as $pub_post)
				<tr>
					<td>
						<a href="{{ route('admin.posts.edit', $pub_post->id) }}">{{ $pub_post->title }}</a>
					</td>
					<td>{{ $pub_post->published_at->toFormattedDateString() }}</td>
					<td>
						<form method="post" action="{{ route('admin.posts.destroy', $pub_post->id) }}" onsubmit="return confirm('Are you sure you want to delete this post?')">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" value="Delete" class="btn btn__small">
						</form>
					</td>
				</tr>
			@endforeach
		</table>
		

		{{ $published->links() }}
	@endif

@endsection