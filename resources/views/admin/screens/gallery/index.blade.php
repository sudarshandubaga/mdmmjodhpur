@extends('admin.layouts.afterlogin')

@section('title', 'Gallery')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <h5 class="card-header">
                        Add Gallery
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.gallery.store') }}" method="post">
                            @csrf
                            @include('admin.screens.gallery._form')
                            <div class="d-grid">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="card">
                    <h5 class="card-header">View Galleries</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galleries as $key => $gallery)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $gallery->title }}</td>
                                            <td>
                                                @if ($gallery->image)
                                                    <img src="{{ $gallery->image }}" alt="{{ $gallery->title }}"
                                                        class="img img-thumbnail" style="max-height: 50px;">
                                                @else
                                                    Not Uploaded
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.gallery.edit', $gallery) }}" title="Edit"
                                                    class="btn btn-link">
                                                    <i class="bx bxs-pencil"></i>
                                                </a>
                                                <button type="button" class="btn btn-link text-danger btn-delete"
                                                    data-href="{{ route('admin.gallery.destroy', [$gallery]) }}">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
