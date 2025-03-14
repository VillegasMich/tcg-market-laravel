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
    @if (session('success'))
      <div id="success-message" class="fixed bottom-5 right-5 bg-green-500 text-white p-3 rounded-md shadow-lg">
        {{ session('success') }}
      </div>
    @elseif (session('error'))
      <div id="error-message" class="fixed bottom-5 right-5 bg-red-500 text-white p-3 rounded-md shadow-lg">
        {{ session('error') }}
      </div>

      <script>
        setTimeout(() => {
          document.getElementById('success-message').style.display = 'none';
        }, 3000);
        setTimeout(() => {
          document.getElementById('error-message').style.display = 'none';
        }, 3000);
      </script>
    @endif
    @yield('content')
  </main>
</body>

</html>
