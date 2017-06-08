{{ csrf_field() }}

<p>
	<label>
		Name: <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}">
	</label>
</p>

<p>
	<label>
		Colour: <input type="text" name="colour" value="{{ old('colour', $category->colour ?? '') }}">
	</label>
</p>


<p>
	<label>
		Sort order: <input type="text" name="sort_order" value="{{ old('sort_order', $category->sort_order ?? '') }}">
	</label>
</p>
