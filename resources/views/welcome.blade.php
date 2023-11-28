@extends('layouts.app')
@section('content')
<section id="hero" class=" flex items-center h-[35vh]">
    <div class="flex container w-9/12 mx-auto ">
        <div class="flex w-full justify-around">
            <div class="flex">
                <h1 class="text-7xl text-white">T7M CsGo</h1>
            </div>
            <div class="flex flex-col">
                <h2 class="text-2xl text-black">Create you own Case Now ! Or open Our New Cases </h2>
                <a href="/create-case" class="bg-[#495E57] p-2 text-xl w-fit text-white rounded-md">View Cases</a>
            </div>
        </div>
    </div>
</section>

<section class="my-5">
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
    <div class="row w-9/12 mx-auto center">
        <div class="col-md-12">
            {{ $skins->links('pagination::tailwind') }}
        </div>
    </div>
    
</section>
@endsection