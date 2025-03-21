<x-layout title="Members List">
    <div class="container">
        <h2>List of Members</h2>
        <x-member-list :members="$members" />

        <div class="pagination">
            {{ $members->links() }}
        </div>
    </div>
</x-layout>
