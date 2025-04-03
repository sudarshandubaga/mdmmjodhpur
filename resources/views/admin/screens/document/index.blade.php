@extends('admin.layouts.afterlogin')

@section('title', 'News')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <h5 class="card-header">
                        Add News
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('admin.screens.news._form')
                            <div class="d-grid">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="card">
                    <h5 class="card-header">View Newss</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Title</th>
                                        <th>File</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($newss as $key => $news)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $news->title }}</td>
                                            <td>
                                                @if ($news->file)
                                                    <a href="{{ $news->file }}" target="_blank">View / Download</a>
                                                @else
                                                    Not Uploaded
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.news.edit', $news) }}" title="Edit"
                                                    class="btn btn-link">
                                                    <i class="bx bxs-pencil"></i>
                                                </a>
                                                <button type="button" class="btn btn-link text-danger btn-delete"
                                                    data-href="{{ route('admin.news.destroy', [$news]) }}">
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
