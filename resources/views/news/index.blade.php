@extends('layouts.app')

@section('body-class', 'news-page')

@section('content')

<section class="all-news-page">

    <div class="container">

        <!-- Page Header -->
        <div class="all-news-header">

            <div class="section-eyebrow">
                <span></span>
                Insights and Announcements
            </div>

            <h1 class="section-title">
                Latest <span>Insights</span>
                <br>and Updates
            </h1>

            <p>
                Stay informed with the latest developments in global
                trade, logistics, shipping and the FreightConnect network.
            </p>

        </div>


        <!-- News Grid -->
        <div class="row g-4">

            @forelse($news as $article)

                <div class="col-12 col-md-6 col-lg-4">

                    <article class="all-news-card">

                        <div class="all-news-image">

                            <img
                                src="{{ asset($article->image) }}"
                                alt="{{ $article->title }}"
                            >

                        </div>

                        <div class="all-news-content">

                            <div class="all-news-meta">

                                <!-- <span class="news-category">
                                    {{ $article->category }}
                                </span> -->

                                @if($article->published_at)
                                    <span class="news-date">
                                        {{ $article->published_at->format('d M Y') }}
                                    </span>
                                @endif

                            </div>

                            <h2>
                                {{ $article->title }}
                            </h2>

                            <p>
                                {{ Str::words($article->excerpt, 35, '...') }}
                            </p>

                            <a href="{{ route('news.show', $article->slug) }}"
                               class="read-more">
                                Read More <span>→</span>
                            </a>

                        </div>

                    </article>

                </div>

            @empty

                <div class="col-12 text-center py-5">
                    <h3>No news available</h3>
                    <p>Check back soon for the latest updates.</p>
                </div>

            @endforelse

        </div>


        <!-- Pagination -->
        <div class="news-pagination">
            {{ $news->links() }}
        </div>

    </div>

</section>

@endsection