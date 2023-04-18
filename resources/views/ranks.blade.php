<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <div class="flex flex-col md:flex-row">
            <!-- Sidebar -->
            @include('components.sidebar')
            <div class="flex justify-center items-center w-full pl-64">
                <div class="w-full max-w-md">
                    <h1 class="text-3xl font-semibold mb-4">Rangen en ranglagen</h1>
                    @foreach($ranks as $role => $rankList)
                        <div class="mb-8">
                            <h2 class="text-2xl font-semibold">{{ $role }}</h2>
                            @if(count($rankList) > 0)
                                <table class="mt-4 w-full border-collapse">
                                    <thead>
                                        <tr>
                                            <th class="py-2 px-4 text-left bg-gray-200">Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rankList->sortBy('id') as $rank)
                                            <tr class="border-t">
                                                <td class="py-2 px-4">{{ $rank->rank }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="mt-4 italic text-gray-600">No ranks found for {{ $role }} role.</p>
                            @endif
                        </div>
                    @endforeach
                    <a href="{{ route('users') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none mb-8 inline-block">
                        Terug
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>