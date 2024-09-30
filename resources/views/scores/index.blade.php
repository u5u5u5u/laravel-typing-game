<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ランキング') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Rank</th>
                                <th class="px-4 py-2">User</th>
                                <th class="px-4 py-2">Time</th>
                                <th class="px-4 py-2">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scores as $score)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('profile.show', $score->user) }}">{{ $score->user->name }}</a>
                                </td>
                                <td class="border px-4 py-2">{{ $score->time }}</td>
                                <td class="border px-4 py-2">{{ $score->created_at->timezone('Asia/Tokyo')->format('Y-m-d H:i:s') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-app-layout>