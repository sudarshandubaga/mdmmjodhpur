@extends('web.layouts.app')

@section('main_section')
    <div class="bg-gray-200 py-3">
        <div class="container mx-auto">
            <a href="{{ route('home') }}" class="text-blue-900 font-semibold">Home</a>
            <span>&raquo;</span>
            <span>Member</span>
        </div>
    </div>
@endsection
