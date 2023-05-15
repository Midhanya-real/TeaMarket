<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tea Market') }}
        </h2>
    </x-slot>

    <div class="py-4 shadow-sm sm:rounded-lg mx-auto left-0 top-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <x-product-filters :filters="$filters"></x-product-filters>
            </div>
        </div>
    </div>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <x-products :products="$products"/>

                @auth()
                    @if(Auth::user()->isAdmin() || Auth::user()->isModer())
                        <div class="flex items-center gap-4 ml-12 mt-3 mb-4">
                            <x-primary-button>
                                <a href="{{route('products.create')}}">
                                    {{__('Create')}}
                                </a>
                            </x-primary-button>
                        </div>
                    @endif
                @endauth

            </div>
        </div>
    </div>
</x-app-layout>
