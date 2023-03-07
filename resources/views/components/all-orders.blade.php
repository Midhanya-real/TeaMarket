<div class="space-y-8">

    @foreach($orders as $order)
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-xl">
            <a class="text-gray-900 text-xl leading-tight font-medium mb-2"
               href="{{route('orders.show', $order)}}">{{__('Order number: #')}}{{$order->id}}</a>
            <p class="text-gray-700 text-base mb-4">
                {{__('product:')}}
                {{$order->product->name}}
            </p>
            <p class="text-gray-700 text-base mb-4">
                {{__('status:')}}
                {{$order->payment->status ?? 'No paid'}}
            </p>

            <p class="text-gray-700 text-base mb-4">
                {{__('price:')}}
                {{$order->product->price * $order->count}}
            </p>

            <p class="text-gray-700 text-base mb-4">
                {{__('count:')}}
                {{$order->count}}
            </p>

            <p class="text-gray-700 text-base mb-4" type="date d-m-Y">
                {{__('created at:')}}
                {{$order->created_at}}
            </p>

            <form action="{{route('orders.destroy', $order)}}" method="POST">
                @csrf
                @method('delete')
                @if(!empty($order->payment->status))
                    @if($order->payment->status == \App\Resources\OrderResources\OrderStatuses::NoPaid)
                        <button type="submit"
                                class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            {{__('Cancel')}}
                        </button>
                    @endif
                @endif
            </form>

            @if(!empty($order->payment->status))
            <form action="{{route('payments.refund', $order->payment)}}" method="POST">
                @csrf
                    @if($order->payment->status != \App\Resources\OrderResources\PaymentStatuses::Refunded && $order->payment->status != \App\Resources\OrderResources\PaymentStatuses::Canceled)
                        <button type="submit"
                                class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            {{__('Refund')}}
                        </button>
                    @endif
            </form>
            @endif

            @if(empty($order->payment->status))
                <form method="POST" action="{{route('payments.store')}}">
                    @csrf
                    <input type="hidden" value="{{$order->id}}" name="id">
                    <input type="hidden" value="{{$order->product->name}}" name="product">
                    <input type="hidden" value="{{$order->product->price * $order->count}}" name="price">
                    <input type="hidden" value="{{$order->count}}" name="count">
                    <input type="hidden" value="{{$order->product_id}}" name="product_id">
                    <input type="hidden" value="{{$order->user_id}}" name="user_id">
                    <input type="hidden" value="redirect" name="type">
                    <input type="hidden" value="http://localhost:81/orders" name="url">

                    <button type="submit"
                            class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                        {{__('Buy')}}
                    </button>
                </form>
            @endif
        </div>
        <div class="block p-6 rounded-lg max-w-xl"></div>
    @endforeach
</div>
