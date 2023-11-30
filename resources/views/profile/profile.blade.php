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
        <header class="bg-blue-500 text-white text-center py-4">
            <h1 class="text-2xl font-semibold">{{$user->name}}</h1>
        </header>
        <main class="container mx-auto mt-8 p-8 bg-white shadow-md">
            
        
                <!-- Image Gallery with Text -->
                <div class="container w-9/12 mx-auto my-3  grid grid-cols-4 gap-4">
                    @foreach ($skins as $skin)             
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{$skin->image}}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$skin->name}}</h5>
                            </a>
                            <p class="mb-3 font-normal  dark:text-gray-400
                            @switch($skin->rarity)
                            @case('Consumer Grade')
                                text-[#b0c4d8]
                                @break
                            @case('Classified')
                                text-[#b12fc1]
                                @break
                            @case('Contraband')
                                text-[#cbab08]
                                @break
                                @case('Extraordinary' || 'Covert')
                                    text-[#eb4c4b]
                                @break
                                @case('Industrial Grade')
                                    text-[#5e98d9]
                                @break
                                @case('Mil-Spec Grade')
                                    text-[#5e98d9]
                                @break
                                @case('Restricted')
                                    text-[#8845ff]
                                @break
                            @endswitch
                            ">{{$skin->rarity}}</p>
                            
                        </div>
                    </div>
                    @endforeach  
                     
                </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    </body>
</html>
