<div class="members-list">
    @foreach($members as $member)
        <div class="member">
            <div>
                <a href="{{ route('single', ['id' => $member->id]) }}">
                    {{ $member->name }} {{ $member->surname }}
                </a>
                <br>
                <small>Phone: {{ $member->phone_number }}</small>
            </div>
        </div>
    @endforeach
</div>
