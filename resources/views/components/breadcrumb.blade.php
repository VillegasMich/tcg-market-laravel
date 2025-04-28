<nav aria-label="breadcrumb" class="w-fit h-fit p-2 text-lg space-x-1">
    @foreach ($breadcrumb as $segment)
      <a class="text-gray-500">{{ ucfirst($segment) }}</a>
      @if (!$loop->last)
        <span class="breadcrumb-separator text-indigo-600">/</span>
      @endif
    @endforeach
</nav>
