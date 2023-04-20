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
                        <h1 class="text-3xl font-bold mb-4">Geclaimde trainingen</h1>
                        @if (count($trainings) > 0)
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-[#374151] text-gray-500">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    Leerling
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    Trainer
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    Geslaagd
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    Gezakt
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-[#1F2937] divide-y divide-gray-200">
                            @foreach ($trainings as $training)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div>
                                        <div class="text-sm font-medium">
                                            {{ $user->username }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm">{{ $trainer->username }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form method="POST" action="{{ route('training.fail', ['id' => $user->id]) }}">
                                        @csrf
                                        <input type="submit" value="Gezakt" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none cursor-pointer">
                                    </form>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form method="POST" action="{{ route('training.success', ['id' => $user->id]) }}">
                                        @csrf
                                        <input type="submit" value="Geslaagd" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none cursor-pointer">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-center">Je hebt momenteel geen trainingen geclaimt.</p>
                @endif
                
                
                <div class="w-full mt-8 flex items-center justify-center flex-col">
                    <a href="{{ route('trainings.overview') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none my-4 inline-block">
                        Terug
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
