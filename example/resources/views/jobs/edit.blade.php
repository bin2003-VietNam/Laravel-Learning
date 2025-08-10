<x-layout>
    <x-slot:heading>
        Edit Job : {{ $job->title }}
    </x-slot:heading>

    <form method="POST" action="/job/{{ $job->id }}" id="edit-form">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">title</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">

                                <input id="title" type="text" name="title" placeholder="Shift leader"
                                    value="{{ $job->title }}"
                                    class="block min-w-0 grow bg-white py-1.5 pr-3 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    required />
                            </div>
                            @error('title')
                                <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">salary</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">

                                <input id="salary" type="text" name="salary" placeholder="$30.000 per year"
                                    value="{{ $job->salary }}"
                                    class="block min-w-0 grow bg-white py-1.5 pr-3 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    required />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- @if($errors->any())
                    <ul>
                        @foreach ( $errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif -->
            </div>


        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <button form="edit-form" type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</button>
            <button form="delete-form"
                class="rounded-md text-red-900 px-3 py-2 text-sm font-semibold  shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                type="submit">Delete</button>

        </div>
    </form>
    <form method="POST" action="/job/{{ $job->id }}" id="delete-form">
        @csrf
        @method('DELETE')
    </form>

</x-layout>