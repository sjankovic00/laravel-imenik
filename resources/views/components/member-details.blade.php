<div class="member-details">
    <h1>{{ $member->name }} {{ $member->surname }}</h1>
    <div class="info"><strong>Phone:</strong> {{ $member->phone_number }}</div>
    <div class="info"><strong>Address:</strong> {{ $member->address }}</div>
    <div class="info"><strong>Email:</strong> {{ $member->email }}</div>
    <div class="info"><strong>Description:</strong> {{ $member->description }}</div>
    @if($member->website)
        <div class="info"><strong>Website:</strong> {{ $member->website }}</div>
    @endif

    <div id="images-container" class="mt-4">
        @forelse($member->images as $image)
            <div class="image-wrapper d-inline-block position-relative m-2">
                <img src="{{ asset('storage/' . $image->filepath) }}" alt="Slika člana" width="100"
                     data-image-id="{{ $image->id }}">
                @if(auth()->user()->role == 'admin')
                    <button class="btn btn-danger btn-sm delete-image" data-image-id="{{ $image->id }}"
                            style="position: absolute; top: 0; right: 0;">X
                    </button>
                @endif
            </div>
        @empty
            <p>Image not found.</p>
        @endforelse
    </div>
</div>
