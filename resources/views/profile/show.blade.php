<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('プロフィール') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
            <a href="{{ route('scores.index') }}" class="text-blue-500 hover:text-blue-700 mr-2">ランキングに戻る</a>
            <p class="text-gray-800 dark:text-gray-300 text-lg">{{ $user->name }}</p>
            <div class="text-gray-600 dark:text-gray-400 text-sm">
                <p>アカウント作成日時: {{ $user->created_at->timezone('Asia/Tokyo')->format('Y-m-d H:i') }}</p>
            </div>
            @if ($bestTime)
            <div>
                <p>Best Time : {{ $bestTime->time }} s</p>
                <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $bestTime->created_at->timezone('Asia/Tokyo')->format('Y-m-d H:i') }}</p>
            </div>
            @endif
            </div>
        </div>
        </div>
    </div>
</x-app-layout>

