<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Enter name" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="designation" class="form-label">Position / Designation</label>
                            <input type="text" id="designation" name="designation" class="form-control"
                                placeholder="Enter Designation" value="{{ old('designation') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select id="category" name="category" class="form-control">
                                <option value="">Select Category</option>
                                <option value="General" {{ old('category') == 'General' ? 'selected' : '' }}>General
                                </option>
                                <option value="OBC" {{ old('category') == 'OBC' ? 'selected' : '' }}>OBC</option>
                                <option value="ST" {{ old('category') == 'ST' ? 'selected' : '' }}>ST</option>
                                <option value="SC" {{ old('category') == 'SC' ? 'selected' : '' }}>SC</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="qualification" class="form-label">Qualification</label>
                            <input type="text" id="qualification" name="qualification" class="form-control"
                                placeholder="Enter qualification" value="{{ old('qualification') }}">
                        </div>
                        <div class="mb-3">
                            <label for="experience" class="form-label">Experience</label>
                            <input type="text" id="experience" name="experience" class="form-control"
                                placeholder="Enter experience" value="{{ old('experience') }}">
                        </div>
                        <div class="mb-3">
                            <label for="subjects_taught" class="form-label">Subjects Taught</label>
                            <input type="text" id="subjects_taught" name="subjects_taught" class="form-control"
                                placeholder="Enter subjects taught" value="{{ old('subjects_taught') }}">
                        </div>
                        <div class="mb-3">
                            <label for="team_type" class="form-label">Team Type</label>
                            <select id="team_type" name="team_type" class="form-control">
                                <option value="Teaching"
                                    {{ old('team_type', 'Teaching') == 'Teaching' ? 'selected' : '' }}>Teaching</option>
                                <option value="Non-Teaching"
                                    {{ old('team_type') == 'Non-Teaching' ? 'selected' : '' }}>
                                    Non-Teaching</option>
                                <option value="Other" {{ old('team_type') == 'Other' ? 'selected' : '' }}>Other
                                </option>
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
                    <x-crop-image name="image" image_file="image_file" width="400" height="500"
                        image="{{ @$team->image }}" />
                </div>
            </div>
        </div>
    </div>
</div>
