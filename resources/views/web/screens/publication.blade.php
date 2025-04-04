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
            <h3 class="text-2xl text-blue-900 font-semibold mb-5">Publication</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($publications as $publication)
                    <div class="rounded overflow-hidden border border-gray-200">
                        <a href="{{ route('blog.show', $publication) }}">
                            <img src="{{ $publication->image }}" alt="" class="w-full h-48 object-cover">
                        </a>
                        <div class="p-3">
                            <a href="{{ route('blog.show', $publication) }}"
                                class="text-lg font-semibold hover:text-blue-900">{{ $publication->title }}</a>
                            <p class="text-sm !text-gray-400">
                                {{ $publication->created_at->diffForHumans() }}
                            </p>
                            <p>
                                {{ substr(strip_tags($publication->description), 0, 200) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-5">
                {{ $publications->links() }}
            </div>
        </div>
    </section>
@endsection
