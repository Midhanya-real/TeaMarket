<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="post" action="{{ route('products.store') }}" class="mt-6 space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="product" :value="__('name')"/>
                        <x-text-input id="product" name="name" type="text" class="mt-1 block"
                                      autocomplete="new-password"/>
                    </div>

                    <div>
                        <x-input-label for="weight" :value="__('weight')"/>
                        <x-text-input id="weight" name="weight" type="number" class="mt-1 block" autocomplete="new-password"/>
                    </div>

                    <div>
                        <x-input-label for="price" :value="__('price')"/>
                        <x-text-input id="price" name="price" type="number" class="mt-1 block"
                                      autocomplete="new-password"/>
                    </div>

                    <div>
                        <x-input-label for="category_id" :value="__('category_id')"/>
                        <x-text-input id="category_id" name="category_id" type="text" class="mt-1 block"
                                      autocomplete="new-password"/>
                    </div>

                    <div>
                        <x-input-label for="type_id" :value="__('type_id')"/>
                        <x-text-input id="type_id" name="type_id" type="text" class="mt-1 block"
                                      autocomplete="new-password"/>
                    </div>

                    <div>
                        <x-input-label for="brand_id" :value="__('brand_id')"/>
                        <x-text-input id="brand_id" name="brand_id" type="text" class="mt-1 block"
                                      autocomplete="new-password"/>
                    </div>

                    <div>
                        <x-input-label for="country_id" :value="__('country_id')"/>
                        <x-text-input id="country_id" name="country_id" type="text" class="mt-1 block"
                                      autocomplete="new-password"/>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
