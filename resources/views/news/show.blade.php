@extends('layouts.main')
@section('title') Новость - {{ $news['title'] }} @parent @endsection
@section('content')
		<h2>{{ $news['title'] }}</h2>
		<p class="lead" style="float: right;">{{ $news['category']['caption'] }}</p>
		<p class="lead">{{ $news['author'] }} - {{ $news['created_at']->format('d-m-Y H:i') }}</p>
		<p>{{ $news['description'] }}</p>

@endsection