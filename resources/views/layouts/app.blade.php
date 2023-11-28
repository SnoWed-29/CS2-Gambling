<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        {{-- scripts  --}} 
        
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        

             <!-- Include Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">


        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body>
        <nav class="bg-[#F5F7F8] p-2 border-b-2 border-[#F4CE14]">
            <div class="flex container w-9/12 mx-auto justify-around">
                <a href="" class="text-[#45474B] p-4 mx-1 text-xl font-semibold hover:border-b-2 hover:border-[#F4CE14]">Skins</a>
                <a href="/cases" class="text-[#45474B] p-4 mx-1 text-xl font-semibold hover:border-b-2 hover:border-[#F4CE14]">Cases</a>
                <a href="/create-case" class="text-[#45474B] p-4 mx-1 text-xl font-semibold hover:border-b-2 hover:border-[#F4CE14]">Create Case</a>
                <a href="" class="text-[#45474B] p-4 mx-1 text-xl font-semibold hover:border-b-2 hover:border-[#F4CE14]">Profile</a>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    </body>
</html>
