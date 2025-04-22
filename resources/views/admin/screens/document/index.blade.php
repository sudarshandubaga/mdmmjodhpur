@extends('admin.layouts.afterlogin')

@section('title', 'Document')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <h5 class="card-header">
                        Add Document
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.document.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('admin.screens.document._form')
                            <div class="d-grid">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="card">
                    <h5 class="card-header">View Documents</h5>
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
                                    @foreach ($documents as $key => $document)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $document->title }}</td>
                                            <td>
                                                @if ($document->file)
                                                    <a href="{{ $document->file }}" target="_blank">View / Download</a>
                                                @else
                                                    Not Uploaded
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.document.edit', $document) }}" title="Edit"
                                                    class="btn btn-link">
                                                    <i class="bx bxs-pencil"></i>
                                                </a>
                                                <button type="button" class="btn btn-link text-danger btn-delete"
                                                    data-href="{{ route('admin.document.destroy', [$document]) }}">
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
