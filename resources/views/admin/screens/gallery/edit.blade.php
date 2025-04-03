@extends('admin.layouts.afterlogin')

@section('title', 'Edit Gallery')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <h5 class="card-header">
                        Edit Gallery
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.gallery.update', $gallery) }}" method="post">
                            @csrf
                            @method('PUT')
                            @include('admin.screens.gallery._form')
                            <div class="d-grid">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Content -->
@endsection
