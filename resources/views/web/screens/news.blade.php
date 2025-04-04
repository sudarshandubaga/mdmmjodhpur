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
            <h3 class="heading">{{ $page->title }}</h3>
            <div>{!! $page->description !!}</div>

            <table class="table-auto w-full border-collapse border border-gray-300 mt-6">
                <thead>
                    <tr class="bg-blue-900 text-white text-left">
                        <th class="border border-gray-300 px-4 py-2">S. No.</th>
                        <th class="border border-gray-300 px-4 py-2">News &amp; Notice</th>
                        <th class="border border-gray-300 px-4 py-2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($newss as $news)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}.</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ $news->file }}" target="_blank"
                                    class="text-blue-900 font-semibold hover:text-blue-700">{{ $news->title }}</a>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $news->created_at->format('F d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
