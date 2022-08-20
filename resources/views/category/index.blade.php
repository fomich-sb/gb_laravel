
@extends('layouts.main')
@section('title') Список новостей @parent @endsection
@section('content')
      @forelse($categoryList as $key => $category)
        @if($loop->index % 2 === 0)
          <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        @endif
            <a href="{{ route('news.index', ['categoryId' => $key]) }}" style='text-decoration: none;'>
              <div class="@if($loop->index % 2 === intval($loop->index / 2) % 2) text-bg-dark @else text-bg-light @endif me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 py-3">
                  <h2 class="display-5">{{ $category['caption'] }}</h2>
                  <p class="lead">{{ $category['description'] }}</p>
                </div>
              </div>
            </a>
            <!--div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
              <div class="my-3 p-3">
                <h2 class="display-5">Another headline</h2>
                <p class="lead">And an even wittier subheading.</p>
              </div>
              <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
            </div -->
        @if($loop->index % 2 === 1)
          </div>
        @endif
      @empty
          <h2>Категорий нет</h2>
      @endforelse

      @if(count($categoryList)>0 && count($categoryList) % 2 === 0)
        </div>
      @endif
@endsection