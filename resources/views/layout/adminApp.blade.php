<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <main class="flex flex-col w-full h-screen bg-gray-700">
    <x-sidebar />
    <div class="p-4 sm:ml-64">
      @yield('content')
    </div>
  </main>
</body>
</html>