@extends('layouts.app')
@section('title', 'View all Bottles')
@section('content')


<main class="flex-center height80">    
        <div class="structure">
            <header class="filter-wrapper mb-10">
                <form action="{{ route('bottle.index') }}" method="GET" class="search-container {{ !empty($query) ? 'expanded' : '' }}" id="search-form">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Recherche..." 
                        class="search-input"
                        value="{{ old('search', $query ?? '')}}"
                        id="search-input"
                    >
                    <button type="submit" class="search-btn" id="search-btn">
                        <i class="fas fa-search" id="search-icon"></i>
                    </button>
                   
                </form>
            </header>
             <!-- Afficher la quantité trouvée par défaut -->
             @if (empty($query))
                <div class="results hidden">
                    <h2>@lang('lang.result_title')</h2>
                    <p><span>{{ $bottles->total() }}</span>@lang('lang.result_subtitle')</p>
                </div>
            @endif
            <!--Afficher la quantité trouvée après la requête -->
            @if (!empty($query))
                <div class="results mb-10">
                    <h2>Recherche de : "{{ $query }}"</h2>
                    <p><span>{{ $bottles->total() }}</span>@lang('lang.result_subtitle')</p>
                    <a href="{{ route('bottle.index') }}" class="btn-border">@lang('lang.bottles')</a>
                </div>
            @endif
            <section class="grid">
                
                @foreach ($bottles as $bottle)
                    <article class="card_bottle">
                        <picture>
                            <img src="{{ $bottle->image_src ?? asset('img/gallery/bottle_1.webp') }}" alt="{{ $bottle->title }}">
                        </picture>
                        <div class="card-body">
                            <div class="card-title">
                                <h2>
                                    {{ $bottle->title }}
                                </h2>
                            </div>
                            <div class="card-category">
                                <p>{{ $bottle->color }}</p>
                                <div class="line"></div>
                                <p>{{ $bottle->size }}</p>
                                <div class="line"></div>
                                <p>{{ $bottle->country }}</p>
                            </div>
                            <div>
                        </div>
                        <div class="btn-container">
                            <a href="{{ route('bottle.details', ['id' => $bottle->id]) }}" class="btn-border">@lang('lang.view')</a>
                            <a href="{{ route('cellar.add', ['id' => $bottle->id]) }}" class="btn-border btn-go"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </article>
                @endforeach
            
            </section>

            <div class="pagination-wrapper">{{ $bottles->links('pagination::bootstrap-4') }}</div>
        </div>
</main>

<script src="{{ asset('js/classes/SearchFormHandler.js') }}"></script>

@endsection