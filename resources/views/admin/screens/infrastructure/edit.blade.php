@extends('admin.layouts.afterlogin')

@section('title', 'Infrastructure » Edit')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="{{ route('admin.infrastructure.update', $infrastructure) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card mb-4 position-sticky top-0" style="z-index: 1;">
                <div class="card-body py-2">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h3 class="m-0">Edit Infrastructure</h3>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary px-5">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <x-alert />
            @include('admin.screens.infrastructure._form')
        </form>
    </div>
    <!-- /Content -->
@endsection
