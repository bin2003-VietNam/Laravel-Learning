<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <ui>
        @foreach ($jobs as $job)
            <li>
                <a href="/job/{{ $job['id'] }}">
                    <strong>{{ $job['title'] }}</strong>: {{ $job['salary'] }}
                </a>
            </li><br />
        @endforeach
    </ui>

</x-layout>