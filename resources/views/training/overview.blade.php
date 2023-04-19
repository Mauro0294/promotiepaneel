<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-[#111827]">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        @include('components.sidebar')
        <div class="flex-grow pl-64 text-white">
            <div class="flex justify-center items-center mt-8">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <h1 class="text-3xl font-bold mb-4">Leden die training nodig hebben</h1>
                        @if (count($users) > 0)
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-[#374151] text-gray-500">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    Afdeling
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    Rang
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    Optie
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-[#1F2937] divide-y divide-gray-200">
                            @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div>
                                        <div class="text-sm font-medium">
                                            {{ $user->username }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm">{{ $user->rank->role }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm">{{ $user->rank->rank }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form method="POST" action="{{ route('training.claim', ['id' => $user->id]) }}">
                                        @csrf
                                        <input type="submit" value="Training geven" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none cursor-pointer">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-center">Er zijn momenteel geen leden die training nodig hebben.</p>
                @endif
                
                
                <div class="w-full mt-8 flex items-center justify-center flex-col">
                    <a href="{{ route('trainings.claimed') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none my-4 inline-block">
                        Geclaimde trainingen
                    </a>
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
    </div>

</body>
</html>
