@extends('layouts.master')

@section('content')

	<h1 class="admin-page-header">Shortcodes <a href="{{ route('admin.shortcodes.create') }}" class="btn btn__small m__lm">Create new shortcode</a></h1>

	<table class="table">
		<tr>
			<th>Shortcode</th>
			<th></th>
		</tr>
		@foreach($shortcodes as $shortcode)
			<tr>
				<td><a href="{{ route('admin.shortcodes.edit', $shortcode->id) }}">{{ $shortcode->shortcode }}</a></td>
				<td>
					<form method="post" action="{{ route('admin.shortcodes.destroy', $shortcode->id) }}" onsubmit="return confirm('Are you sure you want to delete this shortcode? It may be in use in published posts.')">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" value="Delete" class="btn btn__small">
					</form>
				</td>
			</tr>
		@endforeach
	</table>

@endsection