<div class="bg-[#34495E] md:w-64 fixed left-0 top-0 h-full text-white">
    <div class="flex items-center w-full px-6 py-4">
        <img src="{{ asset('images/user.png') }}" alt="User" class="w-8">
        <p class="font-bold ml-2">Mauro0294</p>
    </div>
    <div>
        <h2 class="font-bold uppercase text-sm bg-[#2C3E50] p-4 pl-6">Algemeen</h2>
        <ul>
            <a href="{{ route('home') }}"><li class="py-2 px-6">Home</li></a>
            <a href="{{ route('users') }}"><li class="py-2 px-6">Ledenoverzicht</li></a>
            <a href="{{ route('ranks') }}"><li class="py-2 px-6">Rangen & ranglagen</li></a>
            <li class="py-2 px-6">Solliciteren</li>
            <li class="py-2 px-6">Kluis</li>
            <li class="py-2 px-6">Regelgeving</li>
            <li class="py-2 px-6">Leden opzoeken</li>
        </ul>
        <h2 class="font-bold uppercase text-sm bg-[#2C3E50] p-4 pl-6">Staff</h2>
        <ul>
            <li class="py-2 px-6">Promotie geven</li>
            <a href="{{ route('training.overview') }}"><li class="py-2 px-6">Training geven</li></a>
            <li class="py-2 px-6">Salaris geven</li>
            <li class="py-2 px-6">Waarschuwing geven</li>
        </ul>
        <h2 class="font-bold uppercase text-sm bg-[#2C3E50] p-4 pl-6">Help</h2>
        <ul>
            <li class="py-2 px-6">Trainingen</li>
            <li class="py-2 px-6">Gate besturen</li>
        </ul>
    </div>
</div>