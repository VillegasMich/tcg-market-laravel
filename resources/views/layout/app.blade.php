<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" /> --}}
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/d1023b5858.js" crossorigin="anonymous"></script>
</head>

<body>
  <main class="flex flex-col w-full h-screen"> {{-- Cambiar por clases de Tailwind --}}
    <x-navbar />
    @yield('content')
  </main>
</body>

</html>