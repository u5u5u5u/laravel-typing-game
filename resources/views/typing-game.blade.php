<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="container">
        <h1>Typing Game</h1>
        
        @if ($sentence)
        <p id="sentence" class="text-white">{{ $sentence->sentence }}</p>

        <input type="text" id="inputField" class="form-control" placeholder="Type here...">

        <p class="text-white">Time: <span id="time">0.00</span> seconds</p>
        @else
        <p>No sentence available. Please register a sentence first.</p>
        @endif
    </div>
</x-app-layout>
<script src="{{ asset('/js/main.js') }}"></script>