@extends('web.layouts.app')

@section('main_section')
    <div class="bg-gray-200 py-3">
        <div class="container mx-auto">
            <a href="{{ route('home') }}" class="text-blue-900 font-semibold">Home</a>
            <span>&raquo;</span>
            <span>Member</span>
        </div>
    </div>
    <section class="bg-white py-16">
        <div class="container mx-auto">
            @if (!empty($page->description))
                <div class="mb-3">
                    {!! $page->description !!}
                </div>
            @endif

            @foreach ($members as $type => $teams)
                <h3 class="border-b-2 mb-3 py-3 text-3xl text-blue-900 font-semibold">{{ $type }} Staff</h3>
                <div class="mb-3">
                    @foreach ($teams as $team)
                        <div class="rounded overflow-hidden border border-gray-200 lg:grid grid-cols-5 gap-5 items-center">
                            <div class="col-span-1">
                                <img src="{{ $team->image }}" alt="" class="w-full">
                            </div>
                            <div class="col-span-4 p-3 md:p-0">
                                <div class="grid grid-cols-4 gap-3">
                                    <div class="md:col-span-1 col-span-2 font-semibold">Name:</div>
                                    <div class="md:col-span-3 col-span-2">{{ $team->name }}</div>
                                    <div class="md:col-span-1 col-span-2 font-semibold">Designation:</div>
                                    <div class="md:col-span-3 col-span-2">{{ $team->designation }}</div>
                                    <div class="md:col-span-1 col-span-2 font-semibold">Category:</div>
                                    <div class="md:col-span-3 col-span-2">{{ $team->category }}</div>
                                    <div class="md:col-span-1 col-span-2 font-semibold">Qualification:</div>
                                    <div class="md:col-span-3 col-span-2">{{ $team->qualification }}</div>
                                    <div class="md:col-span-1 col-span-2 font-semibold">Experience:</div>
                                    <div class="md:col-span-3 col-span-2">{{ $team->experience }}</div>
                                    <div class="md:col-span-1 col-span-2 font-semibold">Subjects Taught:</div>
                                    <div class="md:col-span-3 col-span-2">{{ $team->subjects_taught }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
@endsection
