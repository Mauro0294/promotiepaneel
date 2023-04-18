<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head><script src="https://cdn.tailwindcss.com"></script></head>
<body>
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        @include('components.sidebar')
        <div class="flex justify-center items-center w-full pl-64 mt-8">
        <div class="bg-white w-96 rounded-lg shadow-lg p-6">
            <h1 class="text-2xl font-bold mb-4">{{ $user->name }}</h1>
            <p class="text-gray-600"><span class="font-bold">Afdeling:</span> {{ $user->rank->role }}</p>
            <p class="text-gray-600"><span class="font-bold">Rang:</span> {{ $user->rank->rank }}</p>
            @if ($nextRank)
            <p class="text-gray-600"><span class="font-bold">Volgende rang:</span> {{ $nextRank->role }} - {{ $nextRank->rank }}</p>
            @endif
            <h2 class="text-lg font-bold mt-6 mb-2">Warnings:</h2>
            @if (count($warnings) > 0)
            <ul class="list-disc list-inside">
                @foreach ($warnings as $warning)
                    <li class="text-gray-600">{{ $warning->reason }}</li>
                @endforeach
            </ul>
            @else
            <p class="text-gray-600">Geen waarschuwingen gevonden.</p>
            @endif
            <div class="mt-6 flex justify-between">
                <form method="POST" action="{{ route('promote', ['id' => $user->id]) }}">
                    @csrf
                    <input type="submit" value="Geef promotie" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none cursor-pointer">
                </form>
                <form method="POST" action="{{ route('demote', ['id' => $user->id]) }}">
                    @csrf
                    <input type="submit" value="Geef degradatie" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none cursor-pointer">
                </form>
            </div>
            <a href="{{ route('users') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none mt-4 inline-block">
                Terug
            </a>
            @if(session()->has('message'))
                <div class="text-red-500 font-bold mt-2">
                    {{ session('message') }}
                </div>
            @endif
            </div>
        </div>
    </div>


</body>
</html>
