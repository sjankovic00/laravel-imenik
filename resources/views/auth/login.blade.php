<x-layout title="Login">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-4">
            <h1 class="text-center mb-4"><strong>Laravel-imenik by Stefan<strong/></h1>
            <br>
            <br>
            <h2 class="text-center mb-4">Login</h2>

            <form method="POST" action="{{ route('login.submit') }}" class="p-4 border rounded shadow-sm bg-white">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-layout>
