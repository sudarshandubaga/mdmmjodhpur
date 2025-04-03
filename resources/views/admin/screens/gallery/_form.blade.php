<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" id="title" name="title" class="form-control" placeholder="Enter title">
</div>

<div class="mb-3">
    <label for="image_file" class="form-label">Choose Image</label>
    <x-crop-image name="image" image_file="image_file" width="700" height="500" :image="@$gallery->image" />
</div>
