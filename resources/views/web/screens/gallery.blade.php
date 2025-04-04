@extends('web.layouts.app')

@section('main_section')
    <section class="bg-gray-200 py-3">
        <div class="container mx-auto">
            <h1 class="text-3xl text-blue-900 font-semibold">{{ $page->title }}</h1>
            <div>
                <a href="{{ route('home') }}" class="text-blue-900 font-semibold">Home</a>
                <span>&raquo;</span>
                <span>{{ $page->title }}</span>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto">
            <div>{!! $page->description !!}</div>

            {{-- Gallery Section --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mt-10">
                @foreach ($galleries as $gallery)
                    <div class="swiper-slide">
                        <a href="{{ $gallery->image }}" data-lightbox="gallery">
                            <img src="{{ $gallery->image }}" alt="{{ $gallery->title }}"
                                class="rounded-lg object-cover aspect-video w-full">
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-10">
                {{ $galleries->links('pagination::tailwind') }}
            </div>
        </div>
    </section>
@endsection
