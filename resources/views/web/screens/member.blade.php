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

            <div class="grid grid-cols-2 gap-10 uppercase">
                <a href="{{ asset('mssvs-members.pdf') }}"
                    class="text-center bg-gray-200 p-5 rounded-lg shadow hover:bg-blue-900 hover:text-white" target="_blank">
                    Governing Council Members
                </a>
                <a href="{{ route('members.teaching-staff') }}"
                    class="text-center bg-gray-200 p-5 rounded-lg shadow hover:bg-blue-900 hover:text-white">
                    TEACHING STAFF
                </a>
            </div>

        </div>
    </section>
@endsection
