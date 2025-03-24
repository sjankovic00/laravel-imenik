<div class="list-group">
    @foreach($members as $member)
        <a href="{{ route('single', ['id' => $member->id]) }}" class="list-group-item list-group-item-action">
            <h5>{{ $member->name }} {{ $member->surname }}</h5>
            <p>Phone: {{ $member->phone_number }}</p>
        </a>
    @endforeach
</div>
