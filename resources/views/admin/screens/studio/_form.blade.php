<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" name="title" class="form-control"
                                placeholder="Enter title" value="{{ old('title') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="studio_category_id" class="form-label">Select Studio Category</label>
                            <select id="studio_category_id" name="studio_category_id" class="form-control" required>
                                <option value="">Select a category</option>
                                @foreach ($studioCategories as $categoryId => $categoryName)
                                    <option value="{{ $categoryId }}"
                                        {{ old('studio_category_id') == $categoryId ? 'selected' : '' }}>
                                        {{ $categoryName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="image_file" class="form-label">Choose Image</label>
                    <x-crop-image name="image" image_file="image_file" width="800" height="600"
                        image="{{ @$studio->image }}" />
                </div>
            </div>
        </div>
    </div>
</div>
