<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>

<body>
    <x-navbar />  
    <main class="container-fluid vh-100"> {{-- Cambiar por clases de Tailwind --}}
        @yield('content')
    </main>
</body>

</html>
