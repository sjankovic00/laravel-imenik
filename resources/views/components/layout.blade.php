<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Default Title' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Dodaj Bootstrap sa CDN-a -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tvoj stil -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<header>
    <x-nav />
</header>

<div class="container mt-4">
    {{ $slot }}
</div>

<!-- Dodaj Bootstrap JS sa CDN-a (ako je potrebno) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
