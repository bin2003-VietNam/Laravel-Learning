<x-layout>
    <x-slot:heading>
        Job Page
    </x-slot:heading>

    <h2>{{ $job['title'] }}</h2>
    <p>
        This job pay {{ $job['salary'] }} per year
    </p>
    <p class="mt-6">
        <x-button href="/job/{{ $job->id }}/edit">
            Edit Job
        </x-button>
    </p>

</x-layout>