@if(Auth::check())
    <p>You are logged in as {{ Auth::user()->role }}.</p>
@endif
