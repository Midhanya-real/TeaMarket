<div class="space-y-8">

    @foreach($orders as $order)
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-xl">
            <a class="text-gray-900 text-xl leading-tight font-medium mb-2"
            >{{__('Order number: #')}}{{$order->payment_id}}</a>
            <p class="text-gray-700 text-base mb-4">
                {{__('status:')}}
                {{$order->status}}
            </p>

            <p class="text-gray-700 text-base mb-4">
                {{__('price:')}}
                {{$order->price}}
            </p>

            @if($order->status != \App\Resources\OrderResources\OrderHistoryStatuses::Canceled && $order->status != \App\Resources\OrderResources\OrderHistoryStatuses::Succeeded && $order->status != \App\Resources\OrderResources\OrderHistoryStatuses::Refunded)
                <form method="POST" action="{{route('history.cancel', $order)}}">
                    @csrf
                    <button type="submit"
                            class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                        {{__('Cancel')}}
                    </button>
                </form>

                @if(Auth::user()->isAdmin() || Auth::user()->isModer())
                    <form method="POST" action="{{route('history.capture', $order)}}">
                        @csrf
                        <button type="submit"
                                class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            {{__('Capture')}}
                        </button>
                    </form>
                @endif
            @endif

            <form method="POST" action="{{route('history.refund', $order)}}">
                @csrf
                @if($order->status == \App\Resources\OrderResources\OrderHistoryStatuses::Succeeded)
                    <button type="submit"
                            class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                        {{__('Refund')}}
                    </button>
                @endif

            </form>
        </div>

        <div class="block p-6 rounded-lg max-w-xl"></div>
    @endforeach
</div>
