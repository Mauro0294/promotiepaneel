<div class="bg-[#1F2937] md:w-64 fixed left-0 top-0 h-full text-white">
    <a href="{{ route('user', ['id' => $currentUser->id]) }}">
        <div class="flex items-center w-full px-6 py-4">
            <img src="{{ asset('images/user.png') }}" alt="User" class="w-8">
            <p class="font-bold ml-2">{{ $currentUser->username }}</p>
        </div>
    </a>
    <div class="div overflow-y-scroll h-[calc(100vh-4rem)]">
        <h2 class="font-bold uppercase text-sm bg-[#141B23] p-4 pl-6">Algemeen</h2>
        <ul>
            <a href="{{ route('users') }}"><li class="py-2 px-6">Ledenoverzicht</li></a>
            <a href="{{ route('ranks') }}"><li class="py-2 px-6">Rangen & ranglagen</li></a>
            <li class="py-2 px-6">Solliciteren</li>
            <li class="py-2 px-6">Kluis</li>
            <li class="py-2 px-6">Regelgeving</li>
            <li class="py-2 px-6">Leden opzoeken</li>
        </ul>
        @if ($isAdmin)
        <h2 class="font-bold uppercase text-sm bg-[#141B23] p-4 pl-6">Staff</h2>
        <ul>
            <li class="py-2 px-6">Promotie geven</li>
            <a href="{{ route('trainings.overview') }}"><li class="py-2 px-6">Training geven</li></a>
            <li class="py-2 px-6">Salaris geven</li>
            <li class="py-2 px-6">Waarschuwing geven</li>
        </ul>
        @endif
        <h2 class="font-bold uppercase text-sm bg-[#141B23] p-4 pl-6">Help</h2>
        <ul>
            <li class="py-2 px-6">Trainingen</li>
            <li class="py-2 px-6">Gate besturen</li>
        </ul>
        <h2 class="font-bold uppercase text-sm bg-[#141B23] p-4 pl-6">Overig</h2>
        <ul>
            <a href="{{ route('logout') }}"><li class="py-2 px-6">Uitloggen</li></a>
        </ul>
    </div>
</div>

<style>
.overflow-y-scroll {
    overflow-y: scroll;
    scrollbar-width: none;
}

/* For webkit browsers like Safari and Chrome */
.overflow-y-scroll::-webkit-scrollbar {
    display: none;
}
</style>