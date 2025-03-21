<div class="d-flex flex-column align-items-end position-fixed top-0 end-0 m-3">
    @if(Auth::check())
        <a href="{{ route('logout') }}" class="btn btn-danger mb-2">Logout</a>
        @if(Auth::user()->role === 'admin')
            <a href="{{ route('add') }}" class="btn btn-success">Add Member</a>
        @endif
    @endif
</div>
