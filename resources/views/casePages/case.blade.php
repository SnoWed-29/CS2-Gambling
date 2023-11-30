@extends('layouts.app')
@section('content')
<section>
    <div class="container w-9/12 mx-auto shadow-xl p-2 pb-4 my-4">
        <div class="flex justify-center">
            <h2 class="text-4xl w-fit mx-auto uppercase p-4 border-b-2 border-b-[#F4CE14]">{{$box->name}}</h2>
        </div>

        <div class="flex w-full border h-fit my-3 justify-center items-center  shadow-lg" id="randomSkinResult">
            <button id="getRandomSkinButton" class="bg-green-400 p-3 rounded m-6 text-white hover:bg-[#F4CE14]">Open Case</button>
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

<script>
    $(document).ready(function () {
        // Handle button click event
        $('#getRandomSkinButton').on('click', function () {
            // Make an AJAX request to your server
            $.ajax({
                type: 'GET',
                url: '/opencase/' + {{ $box->id }}, // Replace with your actual route and box ID
                beforeSend: function () {
                    // Show a loading message or spinner while waiting for the response
                    $('#randomSkinResult').html('<h1 class="text-2xl m-6">Opening case...</h1>');
                },
                success: function (data) {
                    // Introduce a delay of 3 seconds before displaying the skin
                    setTimeout(function () {
                        // Check if randomSkin property exists
                        if (data.randomSkin) {
                            // Update the content of the randomSkinResult div with the new skin information
                            $('#randomSkinResult').html(
                                '<img src="' + data.randomSkin.image + '" alt="Random Skin Image" class="rounded-lg w-[312px] h-[184px]">' +
                                '<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">' + data.randomSkin.name + '</h5>'
                            );
                        } else {
                            // Display a message if no skin is found
                            $('#randomSkinResult').html('<h1 class="text-2xl m-6">You Lost.</h1>');
                        }
                    }, 1500);
                },
                error: function (xhr, status, error) {
                    // console.error(xhr.responseText);
                    $('#randomSkinResult').html('<h1 class="text-2xl m-6">You Lost.</h1>');
                }
            });
        });
    });
</script>


@endsection