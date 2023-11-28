@extends('layouts.app')
@section('content')
    <h1>hello</h1>
    
    
<section class="my-5">
    <div class="container w-9/12 mx-auto my-3  grid grid-cols-4 gap-4">
        @foreach ($boxes as $box)             
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
            <a href="#">
                <img class="rounded-t-lg" src="{{ asset('box.png')}}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 border-b-2 border-b-[#F4CE14] dark:text-white">{{$box->name}}</h5>
                </a>
                <p class="mb-3 font-normal  dark:text-gray-400">{{$box->created_at->format('d/m/Y')}}</p>
                <a href="/case/{{$box->id}}" class="bg-[#f4cf14d9] p-3 rounded-sm text-white ">View Case</a>
            </div>
        </div>
        @endforeach  
         
    </div>
    <div class="row w-9/12 mx-auto center">
        <div class="col-md-12">
            {{ $boxes->links('pagination::tailwind') }}
        </div>
    </div>
    
</section>
@endsection