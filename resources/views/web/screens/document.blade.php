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

    <section class="py-20 bg-white">
        <div class="container mx-auto">
            <h3 class="heading">{{ $page->title }}</h3>
            <div class="editor">{!! $page->description !!}</div>
            <div class="grid grid-cols-3 gap-5">
                @foreach ($documents as $document)
                    <a href="{{ $document->file }}" target="_blank"
                        class="bg-gray-100 border border-gray-300 px-10 py-10 rounded-md text-gray-700 hover:bg-blue-900 hover:text-white flex items-center gap-2 text-4xl transition-all">
                        <i class="fas fa-download"></i>
                        {{ $document->title }}
                    </a>
                @endforeach
            </div>
        </div>

    </section>
@endsection
