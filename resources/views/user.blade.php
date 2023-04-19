<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-[#111827]">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        @include('components.sidebar')
        <div class="flex justify-center items-center w-full pl-64 mt-8">
        <div class="bg-[#1F2937] w-96 rounded-lg shadow-lg p-6 text-white">
            @if (Auth::user()->id == $user->id)
            <h1 class="text-2xl font-bold mb-4">Jouw profiel</h1>
            @else
            <h1 class="text-2xl font-bold mb-4">Profiel van {{ $user->username }}</h1>
            @endif
            <p><span class="font-bold">Afdeling:</span> {{ $user->rank->role }}</p>
            <p><span class="font-bold">Rang:</span> {{ $user->rank->rank }}</p>
            @if ($nextRank)
            <p><span class="font-bold">Volgende rang:<br></span> {{ $nextRank->role }} - {{ $nextRank->rank }}</p>
            @endif
            <h2 class="text-lg font-bold mt-6 mb-2">Warnings:</h2>
            @if (count($warnings) > 0)
            <ul class="list-disc list-inside">
                @foreach ($warnings as $warning)
                    <li>{{ $warning->reason }}</li>
                @endforeach
            </ul>
            @else
            <p>Geen waarschuwingen gevonden.</p>
            @endif
            @if ($isAdmin)
            <div class="mt-6 flex justify-between">
                @if (Auth::user()->rank_id - $user->rank_id >= 10)
                <form method="POST" action="{{ route('promote', ['id' => $user->id]) }}">
                    @csrf
                    <input type="submit" value="Geef promotie" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none cursor-pointer">
                </form>
                @endif
                @if (Auth::user()->rank_id - $user->rank_id >= 15)
                <form method="POST" action="{{ route('demote', ['id' => $user->id]) }}">
                    @csrf
                    <input type="submit" value="Geef degradatie" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none cursor-pointer">
                </form>
                @endif
            </div>
            @endif
            <a href="{{ route('users') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none my-4 inline-block">
                Terug
            </a>
            <br>
            @if(session()->has('danger'))
                <div class="bg-red-500 text-white rounded p-2 font-bold inline-block">
                    {{ session('danger') }}
                </div>
            @endif
            @if(session()->has('success'))
                <div class="bg-green-500 text-white rounded p-2 font-bold inline-block">
                    {{ session('success') }}
                </div>
            @endif
            </div>
        </div>
    </div>


</body>
</html>
