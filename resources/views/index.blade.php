<x-layout title="Members List">
    <div class="container">

        <x-add-button/>
        <h2>List of Members</h2>

        <div class="list-group">
            @foreach($members as $member)
                <a href="{{ route('single', ['id' => $member->id]) }}" class="list-group-item list-group-item-action">
                    <h5>{{ $member->name }} {{ $member->surname }}</h5>
                    <p>Phone: {{ $member->phone_number }}</p>
                </a>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $members->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-layout>
