@extends('web.layouts.app')

@section('main_section')
    <section class="bg-gray-200 py-3">
        <div class="container mx-auto">
            <h1 class="text-3xl text-blue-900 font-semibold">{{ $page->title }}</h1>
            <div>
                <a href="{{ route('home') }}" class="text-blue-900 font-semibold">Home</a>
                <span>&raquo;</span>
                <a href="{{ route('page.show', 'infrastructure') }}" class="text-blue-900 font-semibold">Infrastructure</a>
                <span>&raquo;</span>
                <span>{{ $page->title }}</span>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="container mx-auto">
            @if (!empty($page->banner_image))
                <div class="mb-5">
                    <img src="{{ $page->banner_image }}" alt="" class="w-full">
                </div>
            @endif
            <div class="editor">{!! $page->description !!}</div>
        </div>
    </section>
@endsection
