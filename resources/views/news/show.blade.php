
@extends('layouts.app')

@section('content')

<section class="article-page">

    <div class="container">

        <!-- Breadcrumb -->
        <div class="article-breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <span>/</span>
            <a href="{{ route('news.index') }}">Insights & Updates</a>
            <span>/</span>
            <span class="current">Article</span>
        </div>

        <!-- Article Header -->
        <div class="article-header">

            <div class="article-meta">

                <!-- @if($article->category)
                    <span class="article-category">
                        {{ $article->category }}
                    </span>
                @endif -->

                @if($article->published_at)
                    <span class="article-date">
                        {{ $article->published_at->format('d F Y') }}
                    </span>
                @endif

            </div>

            <h1>{{ $article->title }}</h1>

            @if($article->excerpt)
                <p class="article-excerpt">
                    {{ $article->excerpt }}
                </p>
            @endif

        </div>

        <!-- Featured Image -->
        @if($article->image)
            <div class="article-featured-image">
                <img
                    src="{{ asset($article->image) }}"
                    alt="{{ $article->title }}"
                >
            </div>
        @endif

        <!-- Article Body -->
        <div class="article-layout">

            <article class="article-content">

                <div class="article-body">
                    {!! nl2br(e($article->content)) !!}
                </div>

                <!-- Source -->
                @if($article->source_name)
                    <div class="article-source">

                        <span>ARTICLE SOURCE</span>

                        @if($article->source_url)
                            <a href="{{ $article->source_url }}"
                               target="_blank"
                               rel="noopener noreferrer">
                                {{ $article->source_name }} ↗
                            </a>
                        @else
                            <strong>{{ $article->source_name }}</strong>
                        @endif

                    </div>
                @endif

                <!-- Back Navigation -->
                <!-- <div class="article-back">
                    <a href="{{ route('news.index') }}">
                        <span>←</span> Back to All News
                    </a>
                </div> -->

            </article>

        </div>

    </div>

</section>

@endsection
