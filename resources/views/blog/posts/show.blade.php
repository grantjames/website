@extends('layouts.master')

@section('content')

	<h1>{{ $post->title }}</h1>

	<p>Posted at {{ $post->published_at->toFormattedDateString() }} in <a href="/category/{{ $post->category->name }}">{{ $post->category->name }}</a></p>

	<div class="post-body">
		<p>
			{{ $post->excerpt }}
		</p>
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