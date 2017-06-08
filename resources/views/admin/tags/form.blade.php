{{ csrf_field() }}

<label>
	Tag name: <input type="text" name="name" value="{{ old('name', $tag->name ?? '') }}">
</label>