<div class="space-y-8">

    @foreach($orders as $order)
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-xl">
            <a class="text-gray-900 text-xl leading-tight font-medium mb-2"
               href="{{route('orders.show', $order)}}">{{$order->id}}</a>
            <p class="text-gray-700 text-base mb-4">
                {{__('product:')}}
                {{$order->product->name}}
            </p>
            <p class="text-gray-700 text-base mb-4">
                {{__('status:')}}
                {{$order->status}}
            </p>
            <p class="text-gray-700 text-base mb-4">
                {{__('count:')}}
                {{$order->count}}
            </p>

            <p class="text-gray-700 text-base mb-4" type="date">
                {{__('created at:')}}
                {{$order->created_at}}
            </p>

            <button type="submit"
                    class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                <a href="{{route('addresses.update', $order)}}">
                    {{__('Cancel')}}
                </a>
            </button>

            @if($order->status === \App\Resources\OrderResources\OrderStatuses::NoPaid)  <!--Поправить адрес-->
                <button type="submit"
                        class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    <a href="{{route('orders.destroy', $order)}}">
                        {{__('To pay')}}
                    </a>
                </button>
            @endif

            @if(Auth::user()->isAdmin() || Auth::user()->isModer())
                <button type="submit"
                        class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    <a href="{{route('addresses.edit', $order)}}">
                        {{__('Update')}}
                    </a>
                </button>
            @endif
        </div>
    @endforeach
</div>
