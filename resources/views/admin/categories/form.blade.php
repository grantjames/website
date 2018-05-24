{{ csrf_field() }}

<div class="row">
	<div class="col-4">
		<p>
			<label>
				Name: <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}">
			</label>
		</p>
	</div>
	<div class="col-4">
		<p>
			<label>
				Colour: <input type="text" name="colour" value="{{ old('colour', $category->colour ?? '') }}">
			</label>
		</p>
	</div>
	<div class="col-4">
		<p>
			<label>
				Sort order: <input type="text" name="sort_order" value="{{ old('sort_order', $category->sort_order ?? '') }}">
			</label>
		</p>
	</div>
</div>





