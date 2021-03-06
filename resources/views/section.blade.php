@extends('layouts.barrilete')
@section('title', 'Barrilete | '.ucfirst($articles->first()->section->name))
@section('article_title', $articles->first()->title)
@section('description', $articles->first()->article_desc)
@section('article_type', 'article')
@section('article_desc', $articles->first()->article_desc)
@section('article_url', route('section',['seccion'=>str_slug($articles->first()->section->name)]))
@section('article_photo', 'https://barrilete.com.ar/img/articles/.thumbs/images/'.$articles->first()->photo)
@section('site_name', 'Barrilete')
@section('created_at', $articles->first()->created_at)
@section('updated_at', $articles->first()->updated_at)
@section('article_section', $articles->first()->section->name)
@section('content')
@forelse ($articles as $sec)
    <article class="pubIndex">
        <div class="seccion" onclick="location.href ='{{ route('section', ['section' => $sec -> section -> name ]) }}'">{{ $sec -> section -> name }}</div>
        @if ($sec -> video == 1)<img src="{{ asset('img/play-button.png') }}" class="video"  onclick="location.href ='{{ route('article', ['id' => $sec -> id, 'section' => $sec -> section -> name ,'title' => str_slug($sec -> title, '-')]) }}'" />@endif
        @if ($loop->iteration == 1)
        <img data-src="{{ asset('/img/articles/images/'.$sec -> photo) }}" title="{{ $sec -> title  }}" alt="{{ $sec -> title  }}" class="lazy"   onclick="location.href ='{{ route('article', ['id' => $sec -> id, 'section' => $sec -> section -> name ,'title' => str_slug($sec -> title, '-')]) }}'" />
        @else
        <img data-src="{{ asset('/img/articles/.thumbs/images/'.$sec->photo) }}" title="{{ $sec -> title  }}" alt="{{ $sec -> title  }}" class="lazy"   onclick="location.href ='{{ route('article', ['id' => $sec -> id, 'section' => $sec -> section -> name ,'title' => str_slug($sec -> title, '-')]) }}'" />
        @endif
        <a href="{{ route('article', ['id' => $sec -> id, 'section' => $sec -> section -> name ,'title' => str_slug($sec -> title, '-')]) }}">{{ $sec -> title  }}</a>
        <p>{{ $sec -> article_desc }}</p>
    </article>
@empty
    <h1>No hay artículos para mostrar</h1>
@endforelse
@endsection

