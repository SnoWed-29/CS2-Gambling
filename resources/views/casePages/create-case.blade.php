@extends('layouts.app') 

@section('content')
    <div class="container mx-auto mt-8">
        <form action="/create-case" method="post">
            @csrf

            <!-- Case Name Input -->
            <div class="mb-4">
                <label for="caseName" class="block text-gray-700 text-sm font-bold mb-2">Case Name:</label>
                <input type="text" id="caseName" name="name" class="w-full px-4 py-2 border rounded">
            </div>

            <!-- Multi-Select Menu -->
            <div class="mb-4">
                <label for="items" class="block text-gray-700 text-sm font-bold mb-2">Select Items:</label>
                <select id="items" name="skins[]" multiple class="w-full px-4 py-2 border rounded">
                    
                    @foreach($skins as $skin)
                        <option value="{{ $skin->id }}">{{ $skin->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Submit Button -->
            <div class="mb-4">
                <input type="submit" class="bg-blue-500 text-white px-4 py-2 rounded block" value="create case">
            </div>
        </form>
    </div>


    <script>
        $(document).ready(function() {
        $('#items').select2({
            placeholder: 'Search for items',
            allowClear: true,
            closeOnSelect: false
             });
        });

        document.getElementById('items').addEventListener('mousedown', function(e) {
            e.preventDefault();

            var originalScrollTop = this.scrollTop;

            e.target.selected = !e.target.selected;

            this.focus();

            setTimeout(function() {
                this.scrollTop = originalScrollTop;
            }.bind(this), 0);
        });

    </script>
@endsection
