<x-layout>
    <x-slot:heading>
        Log in
    </x-slot:heading>

    <form method="POST" action="/login">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-feild>
                        <x-form-label for="email">email</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="email" name="email" placeholder="*@gmail.com" type="email" :value="old('email')"/>
                            <x-form-error name="email" />
                        </div>
                    </x-form-feild>

                    <x-form-feild>
                        <x-form-label for="password">password</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="password" name="password" placeholder="******" type="password" />
                            <x-form-error name="password" />
                        </div>
                    </x-form-feild>
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
            <x-form-button>Log in</x-form-button>
        </div>
    </form>


</x-layout>