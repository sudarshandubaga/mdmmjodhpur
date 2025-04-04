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

    <section>
        <div class="container mx-auto">
            <div>{!! $page->description !!}</div>
        </div>

        <div class="container mx-auto mt-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($courses as $course)
                    <div class="rounded overflow-hidden border border-gray-200">
                        <a href="{{ route('academic.index', ['course' => $course]) }}">
                            <img src="{{ $course->image }}" alt="" class="w-full h-48 object-cover">
                        </a>
                        <div class="p-3">
                            <a href="{{ route('academic.index', ['course' => $course]) }}"
                                class="text-lg font-semibold hover:text-blue-900">{{ $course->title }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-5">
                {{ $courses->links() }}
            </div>
        </div>
    </section>
@endsection
