<div class="member-details">
    <h1>{{ $member->name }} {{ $member->surname }}</h1>
    <div class="info"><strong>Phone:</strong> {{ $member->phone_number }}</div>
    <div class="info"><strong>Address:</strong> {{ $member->address }}</div>
    <div class="info"><strong>Email:</strong> {{ $member->email }}</div>
    <div class="info"><strong>Description:</strong> {{ $member->description }}</div>
    @if($member->website)
        <div class="info"><strong>Website:</strong> {{ $member->website }}</div>
    @endif

</div>
