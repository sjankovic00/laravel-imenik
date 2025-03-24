<x-layout title="Member Details">
    <div class="container">
        <x-member-details :member="$member"/>

        @if(auth()->user()->role == 'admin')
            <form id="upload-image-form" enctype="multipart/form-data" data-member-id="{{ $member->id }}" class="mt-4">
                @csrf
                <input type="file" name="image" id="image" accept="image/*">
                <button type="submit" class="btn btn-primary">Upload Image</button>
            </form>
            <div class="admin-actions mt-4">
                <button class="btn btn-warning edit-member" data-id="{{ $member->id }}">Edit</button>
                <button class="btn btn-danger delete-btn" data-id="{{ $member->id }}">Delete</button>
            </div>

        @endif
        <div id="message" class="mt-2"></div>

        <a href="{{ route('index') }}" class="btn btn-secondary mt-4">Back to list</a>
    </div>

    <div class="modal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" name="surname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="url" name="website" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.currentUserRole = '{{ auth()->user()->role }}';
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/edit.js') }}"></script>
</x-layout>
