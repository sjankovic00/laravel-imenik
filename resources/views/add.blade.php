<x-layout title="Add Member">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Add Member</h2>

        <form method="POST" action="{{ route('add.submit') }}" class="mx-auto" style="max-width: 600px;">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Surname:</label>
                <input type="text" id="surname" name="surname" class="form-control" value="{{ old('surname') }}" required>
                @error('surname') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
                @error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}">
                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="website" class="form-label">Website:</label>
                <input type="url" id="website" name="website" class="form-control" value="{{ old('website') }}">
                @error('website') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Add Member</button>
            <a href="{{ route('index') }}" class="btn btn-secondary mt-4">Back to list</a>

        </form>
    </div>
</x-layout>
