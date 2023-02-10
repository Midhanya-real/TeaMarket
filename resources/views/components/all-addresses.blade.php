<div class="space-y-8">

    @foreach($addresses as $address)
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-xl">
            <a class="text-gray-900 text-xl leading-tight font-medium mb-2">
                {{$address->postcode}}
            </a>

            <p class="text-gray-700 text-base mb-4">
                {{__('Country:')}}
                {{$address->country}}
            </p>

            <p class="text-gray-700 text-base mb-4">
                {{__('city:')}}
                {{$address->city}}
            </p>

            <p class="text-gray-700 text-base mb-4">
                {{__('street:')}}
                {{$address->street}}
            </p>

            <p class="text-gray-700 text-base mb-4">
                {{__('house:')}}
                {{$address->house}}
            </p>

            <p class="text-gray-700 text-base mb-4">
                {{__('apartment:')}}
                {{$address->apartment}}
            </p>

            <button type="submit"
                    class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                <a href="{{route('addresses.edit', $address)}}">
                    {{__('Update')}}
                </a>
            </button>

            <button type="submit"
                    class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                <a href="{{route('addresses.destroy', $address)}}">
                    {{__('Delete')}}
                </a>
            </button>
        </div>
    @endforeach
</div>

<div class="block p-2 rounded-lg shadow-lg bg-white">
    <button type="submit"
            class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
        <a href="{{route('addresses.create')}}">
            {{__('Create')}}
        </a>
    </button>
</div>
