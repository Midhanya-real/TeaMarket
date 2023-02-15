<section>
    <div class="flex justify-center inline-flex mt-2 mx-px">
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-xl space-x-2">

            <p class="text-gray-700 text-base mb-4">
                {{__('Name:')}}
                {{$product->name}}
            </p>

            <p class="text-gray-700 text-base mb-4">
                {{__('Type:')}}
                {{$product->type->name}}
            </p>

            <p class="text-gray-700 text-base mb-4">
                {{__('Weight:')}}
                {{$product->weight}}
            </p>

            <p class="text-gray-700 text-base mb-4">
                {{__('Price:')}}
                {{$product->price}}
            </p>

            <p class="text-gray-700 text-base mb-4">
                {{__('Brand:')}}
                {{$product->brand->name}}
            </p>

            <p class="text-gray-700 text-base mb-4">
                {{__('Country:')}}
                {{$product->country->name}}
            </p>

            <form method="POST" action="{{route('orders.store')}}">
                @csrf
                <input type="hidden" value="{{$product->id}}" name="product_id">
                <input type="hidden" value="no paid" name="status">
                <input type="hidden" value="1" name="count">
                <button type="submit"
                        class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    {{__('Buy')}}
                </button>
            </form>

        </div>
    </div>
</section>

