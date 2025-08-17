<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel position</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900 text-white font-hanken-grotesk">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/60">
            <div>
                <a href="/">
                    <img src="{{ Vite::asset('resources/images/logo.jpg') }}" alt="logo.jpg" class="
                                h-20 w-20 rounded-full object-cover
                         " />
                </a>
            </div>

            <div class="space-x-6 font-bold">
                <a href="">jobs</a>
                <a href="">Careers</a>
                <a href="">Salaries</a>
                <a href="">Companies</a>
            </div>

            @auth
                <div class="flex space-x-6">
                    <a href="/jobs/create">Post a job</a>
                    <form method="POST" action="/logout" >
                        @csrf
                        @method('DELETE')
                        <button class="cursor-pointer">
                            Log out
                        </button>
                    </form>
                </div>
            @endauth

            @guest
                  <div class="space-x-6 font-bold">
                    <a href="/register">Sign up</a>
                    <a href="/login">Log in</a>
                 </div>
            @endguest

        </nav>

        <main class="mt-10 max-w[986px] mx-auto ">
            {{ $slot }}
        </main>
    </div>
</body>

</html>