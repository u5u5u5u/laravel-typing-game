<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Typing Game</h1>
                        
                        @if ($sentences && $sentences->isNotEmpty())
                        <p id="sentence" class="text-white">{{ $sentences[0]->sentence }}</p>

                        <input type="text" id="inputField" class="form-control" placeholder="Type here...">

                        <p class="text-white">Time: <span id="time">0.00</span> seconds</p>
                        @else
                        <p>No sentence available. Please register a sentence first.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="{{ asset('/js/main.js') }}"></script>
<script>
    const sentences = @json($sentences);
</script>