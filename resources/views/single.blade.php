<x-layout title="Member Details">
    <div class="container">
        <x-member-details :member="$member" />

        @if(auth()->user()->role == 'admin')
            <div class="admin-actions">
                <a href="{{ route('edit', ['id' => $member->id]) }}" class="btn btn-warning">Edit</a>
                <button class="btn btn-danger delete-btn" data-id="{{ $member->id }}">Delete</button>
            </div>
        @endif

        <a href="{{ route('index') }}" class="btn btn-secondary mt-4">Back to list</a>
    </div>
</x-layout>
