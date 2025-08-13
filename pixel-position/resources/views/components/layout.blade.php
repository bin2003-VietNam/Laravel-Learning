<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel position</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900 text-white">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/60">
            <div>
                <a href="">
                    <img src="{{ Vite::asset('resources/images/logo.jpg') }}" 
                        alt="logo.jpg" 
                        class="
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

            <div>
                <a href="">Post a job</a>
            </div>
        </nav>

        <main class="mt-10 max-w[986px] mx-auto ">
            {{ $slot }}
        </main>
    </div>
</body>

</html>