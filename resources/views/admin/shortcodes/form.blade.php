{{ csrf_field() }}

<div class="row">
	<div class="col-12">
		<p>
			<label>
				Shortcode: <input type="text" name="shortcode" value="{{ old('shortcode', $shortcode->shortcode ?? '') }}">
			</label>
		</p>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<p>
			<label>
				Content (markdown): <textarea name="content">{{ old('content', $shortcode->content ?? '') }}</textarea>
			</label>
		</p>
	</div>
</div>
