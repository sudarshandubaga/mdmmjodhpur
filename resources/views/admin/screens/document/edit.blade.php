@extends('admin.layouts.afterlogin')

@section('title', 'Edit Document')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <h5 class="card-header">
                        Edit Document
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.document.update', $document) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('admin.screens.document._form')
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
