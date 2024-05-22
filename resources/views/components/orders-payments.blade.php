<div class="space-y-8 dark:bg-gray-900">

    @foreach($orders as $order)
        <div class="justify-center inline-flex mt-3 mx-px">
            <div class="block p-6 rounded-lg shadow-lg bg-white w-48 sm:max-w-sm  sm:ml-6 mt-3 mb-4 mr-2">
                <a class="text-gray-900 text-xl leading-tight font-medium mb-2"
                >{{__('Order number: #')}}{{$order->id}}</a>
                <p class="text-gray-700 text-base mb-4">
                    {{__('status:')}}
                    {{$order->status}}
                </p>

                <p class="text-gray-700 text-base mb-4">
                    {{__('price:')}}
                    {{$order->price}}
                </p>

                <form method="POST" action="{{route('payments.refund', $order)}}">
                    @csrf
                    @if($order->status == \App\Resources\OrderResources\PaymentStatuses::Succeeded)
                        <button type="submit"
                                class=" inline-block px-6 py-2.5 bg-blue-600 text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            {{__('Refund')}}
                        </button>
                    @endif

                </form>
            </div>
        </div>
    @endforeach
</div>
