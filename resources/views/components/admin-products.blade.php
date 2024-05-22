<section>
    <div class="bloc px-1 mx-1 justify-center  space-x-2 space-y-2">
        @foreach($products as $product)
            <div class="justify-center inline-flex mt-3 mx-px">
                <div
                    class="block p-6 w-auto rounded-lg shadow-lg bg-white max-w-xl space-x-2 space-y-2 ml-12 mt-3 mx-10 mb-6">
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

                    <div class="inline-flex mx-auto">
                        <form method="GET" action="{{route('admin.products.edit', $product)}}">
                            @csrf
                            @method('patch')

                            <div class="flex items-center gap-4 mt-3">
                                <x-primary-button>{{ __('Update') }}</x-primary-button>
                            </div>
                        </form>

                        <div class="block p-2 rounded-lg max-w-xl"></div>

                        <form method="POST" action="{{route('admin.products.destroy', $product)}}">
                            @csrf
                            @method('delete')

                            <div class="flex items-center gap-4 mt-3">
                                <x-primary-button>{{ __('Delete') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="p-6 rounded-lg max-w-xl inline-flex"></div>
        @endforeach

            <div class="flex items-center gap-4 mb-4 ml-12">
                <x-primary-button>
                    <a href="{{route('admin.products.create')}}">
                        {{__('Create')}}
                    </a>
                </x-primary-button>
            </div>
    </div>
</section>
