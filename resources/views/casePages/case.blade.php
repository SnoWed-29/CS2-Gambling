@extends('layouts.app')
@section('content')
<section>
    <div class="container w-9/12 mx-auto shadow-xl p-2 pb-4 my-4">
        <div class="flex justify-center">
            <h2 class="text-4xl w-fit mx-auto uppercase p-4 border-b-2 border-b-[#F4CE14]">{{$box->name}}</h2>
        </div>

        <div class="flex w-full border h-36 my-3 justify-center items-center  shadow-lg">
            <button class="bg-green-400 p-3 rounded text-white hover:bg-[#F4CE14]">Open Case</button>
        </div>
        <div class="containermy-3  grid grid-cols-4 gap-4">
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
    </div>
</section>
@endsection