<section>
    <div class="bloc px-1 mx-1 justify-center  space-x-2 space-y-2">
        @foreach($products as $product)
            <div class="justify-center inline-flex mt-3 mx-px">
                <div
                    class="block p-6 w-48 h-auto rounded-lg shadow-lg bg-white max-w-xl space-x-2 space-y-2 ml-12 mt-3 mx-10 mb-6">
                    <a class="text-gray-900 text-xl leading-tight font-medium mb-2"
                       href="{{route('products.show', $product)}}">{{$product->name}}
                    </a>
                    <p class="text-gray-700 text-base mb-4">
                        {{__('Weight:')}}
                        {{$product->weight}}
                    </p>
                    <p class="text-gray-700 text-base mb-4">
                        {{__('Price:')}}
                        {{$product->price}}
                    </p>

                    <div>
                        <form method="POST" action="{{route('orders.store')}}">
                            @csrf
                            <input type="hidden" value="{{$product->id}}" name="product_id">
                            <input type="hidden" value="{{\App\Resources\OrderResources\OrderStatuses::NoPaid}}" name="status">
                            <input type="hidden" value="1" name="count">
                            <button type="submit"
                                    class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                {{__('Buy')}}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="p-6 rounded-lg max-w-xl inline-flex"></div>
        @endforeach
    </div>
</section>
