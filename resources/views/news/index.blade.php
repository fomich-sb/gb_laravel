
@extends('layouts.main')
@section('title') Список новостей @parent @endsection
@section('content')
    @if(isset($category))
      <h2>{{ $category->caption }}</h2><br>
    @else
      <h2>Все новости</h2><br>
    @endif
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      @forelse($newsList as $news)
        @if($loop->index % 2 === 0)
          <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        @endif
            <a href="{{ route('news.show', ['id' => $news->id]) }}" style='text-decoration: none;'>
              <div class="@if($loop->index % 2 === intval($loop->index / 2) % 2) text-bg-dark @else text-bg-light @endif me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 py-3">
                  <h2 class="display-5">{{ $news->title }}</h2>
                  <p class="lead">{{ $news->category_caption }}</p>
                  <p class="lead">{{ $news->author }} @if(!is_null($news->created_at)) - {{ $news->created_at->format('d-m-Y H:i') }} @endif</p>
                </div>
              </div>
            </a>

        @if($loop->index % 2 === 1)
          </div>
        @endif
      @empty
          <h2>Записей нет</h2>
      @endforelse

      @if(count($newsList)>0 && count($newsList) % 2 === 0)
        </div>
      @endif
    </div>
@endsection