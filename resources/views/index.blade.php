<x-layout title="Members List">
    <div class="container">
        <x-login-message/>
        <x-add-button/>
        <h2>List of Members</h2>

        <x-member-list :members="$members"/>

        <div class="d-flex justify-content-center mt-4">
            {{ $members->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-layout>
