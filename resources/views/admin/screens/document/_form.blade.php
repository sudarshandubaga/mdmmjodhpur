<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" id="title" name="title" class="form-control" placeholder="Enter title"
        value="{{ old('title') }}">
</div>

<div class="mb-3">
    <label for="file" class="form-label">Choose File</label>
    <input type="file" name="file" id="file" accept=".pdf,.doc,.docx">

    @if (!empty($document->file))
        <div class="mt-2">
            <a href="{{ $document->file }}" target="_blank">View / Download</a>
        </div>
    @endif
</div>
