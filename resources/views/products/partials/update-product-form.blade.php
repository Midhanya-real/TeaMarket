<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="post" action="{{ route('admin.products.update', $product)}}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div class="items-center">
                        <div class="inline-flex">
                            <div class="ml-3">
                                <x-input-label for="product" :value="__('name')"/>
                                <x-text-input id="product" name="name" type="text" class="mt-1 block"
                                              autocomplete="new-password" :value="old('name', $product->name)"/>
                            </div>

                            <div class="ml-3">
                                <x-input-label for="weight" :value="__('weight')"/>
                                <x-text-input id="weight" name="weight" type="number" class="mt-1 block"
                                              autocomplete="new-password" :value="old('weight', $product->weight)"/>
                            </div>

                            <div class="ml-3">
                                <x-input-label for="price" :value="__('price')"/>
                                <x-text-input id="price" name="price" type="number" class="mt-1 block"
                                              autocomplete="new-password" :value="old('price', $product->price)"/>
                            </div>
                        </div>
                    </div>

                    <div class="items-center">
                        <div class="inline-flex">
                            <div class="ml-3">
                                <x-input-label for="category_id" :value="__('category')"/>
                                <x-text-input id="category_id" name="category_id" type="text" class="mt-1 block"
                                              autocomplete="new-password"
                                              :value="old('category_id', $product->category_id)"/>
                            </div>

                            <div class="ml-3">
                                <x-input-label for="type_id" :value="__('type')"/>
                                <x-text-input id="type_id" name="type_id" type="text" class="mt-1 block"
                                              autocomplete="new-password" :value="old('type_id', $product->type_id)"/>
                            </div>
                        </div>
                    </div>

                    <div class="items-center">
                        <div class="inline-flex">
                            <div class="ml-3">
                                <x-input-label for="brand_id" :value="__('brand')"/>
                                <x-text-input id="brand_id" name="brand_id" type="text" class="mt-1 block"
                                              autocomplete="new-password" :value="old('brand_id', $product->brand_id)"/>
                            </div>

                            <div class="ml-3">
                                <x-input-label for="country_id" :value="__('country')"/>
                                <x-text-input id="country_id" name="country_id" type="text" class="mt-1 block"
                                              autocomplete="new-password"
                                              :value="old('country_id', $product->country_id)"/>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 ml-3">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
