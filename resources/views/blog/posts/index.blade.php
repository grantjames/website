@extends('layouts.master')

@section('content')

	@if( ! empty($tag))
		<h1>Posts tagged with '{{ $tag }}'</h1>
		<hr>
	@endif


	@foreach($posts as $post)
		<article class="post-listing">
            <h1>
                <a href="/{{ $post->slug }}" class="post-listing__title">{{ $post->title }}</a>
            </h1>
            <p class="post-listing__meta">
				Posted on {{ $post->published_at->toFormattedDateString() }} @if(empty($category)) in <a href="/category/{{ $post->category->name }}" style="color: {{ $post->category->colour }}">{{ $post->category->name }}@endif</a>
            </p>
            <p class="post-listing__snippet">
                {{ $post->excerpt }}
            </p>
            <p>
                <a href="/{{ $post->slug }}" class="btn post-listing__read-more">Read More</a>
            </p>
        </article>

	@endforeach

	{{ $posts->links() }}

@endsection