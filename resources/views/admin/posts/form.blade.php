{{ csrf_field() }}

<p>
	<label>
		Title<br> <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" id="title">
	</label>
</p>

<p>
	<label>
		Slug <small><a href="#" onclick="generateSlug()">Generate from title</a></small><br> <input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}" id="slug">
	</label>
</p>

<p>
	<label>
		Excerpt<br>
		<textarea rows="4" name="excerpt">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
	</label>
</p>

<p>
	<label>
		Body (Markdown syntax)<br>
		<textarea rows="10" name="body">{{ old('body', $post->body ?? '') }}</textarea>
	</label>
</p>

<p>
	<label>
		Category<br>
		<select name="category_id" id="category_id">
			@foreach ($categories as $category)
				<option value="{{ $category->id }}" @if (( old('category_id', $post->category_id ?? '')) == $category->id) {{ 'selected' }} @endif }}>{{ $category->name }}</option>
			@endforeach
		</select>
	</label>
</p>

<p>
	<label>
		Publish date<br> <input type="text" name="published_at" value="{{ old('published_at', $post->published_at ?? '') }}" placeholder="Y-m-d H:i:s">
	</label>
</p>

@section('scripts')
	<script>
		var slug = document.getElementById('slug');
		var title = document.getElementById('title');

		function generateSlug() {
			event.preventDefault();

			slug.value = title.value
					.toLowerCase()
					.replace(/\s+/g, '-')           // Replace spaces with -
					.replace(/[^\w\-]+/g, '')       // Remove all non-word chars
					.replace(/\-\-+/g, '-')         // Replace multiple - with single -
					.replace(/^-+/, '')             // Trim - from start of text
					.replace(/-+$/, '');            // Trim - from end of text

			return false;
		};
	</script>
@endsection