@extends('layouts.master')

@section('content')

	<div class="post">
		<h1 class="post__title">{{ $post->title }}</h1>

		<p class="post__meta">Posted at {{ $post->published_at->toFormattedDateString() }} in <a href="/category/{{ $post->category->name }}">{{ $post->category->name }}</a></p>

		<p class="post__excerpt">
			{{ $post->excerpt }}
		</p>

		<div class="post__body">
			{!! $post->body_html !!}
		</div>

		{{--
		@if($tags = $post->tags)
			<h2>Tags:</h2>

			<ul>
				@foreach($tags as $tag)
					<li><a href="/tag/{{ $tag->name }}">{{ $tag->name }}</a></li>
				@endforeach
			</ul>
		@endif
		--}}
	</div>

	<div id="disqus_thread"></div>
	<script>
		var disqus_config = function () {
			this.page.url = '{{ url('/posts/' . $post->id) }}';
			this.page.identifier = '/posts/{{ $post->id }}';
		};
		(function() { // DON'T EDIT BELOW THIS LINE
			var d = document, s = d.createElement('script');
			s.src = 'https://gjames.disqus.com/embed.js';
			s.setAttribute('data-timestamp', +new Date());
			(d.head || d.body).appendChild(s);
		})();
	</script>

@endsection

@section('scripts')
	@if($post->bodyContainsCode())
		<script src="/js/highlight.pack.js"></script>
		<script>
			hljs.initHighlightingOnLoad();
		</script>
	@endif
@endsection