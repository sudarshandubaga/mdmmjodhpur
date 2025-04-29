@extends('web.layouts.app')

@section('main_section')
    <div class="bg-gray-200 py-3">
        <div class="container mx-auto">
            <a href="{{ route('home') }}" class="text-blue-900 font-semibold">Home</a>
            <span>&raquo;</span>
            <a href="{{ route('page.show', 'members') }}" class="text-blue-900 font-semibold">Member</a>
            <span>&raquo;</span>
            <span>Governing Council Members</span>
        </div>
    </div>
    <section class="bg-white py-16">
        <div class="container mx-auto">

        </div>
    </section>
@endsection
