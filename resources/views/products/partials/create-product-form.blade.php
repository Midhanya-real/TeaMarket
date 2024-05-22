<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('admin.products.store') }}" class="mt-6 space-y-6">
                    @csrf

                    <div>
                        <div class="inline-flex">
                            <div class="ml-3">
                                <x-input-label for="product" :value="__('name')"/>
                                <x-text-input id="product" name="name" type="text" class="mt-1 block"
                                              autocomplete="new-password"/>
                            </div>

                            <div class="ml-3">
                                <x-input-label for="weight" :value="__('weight')"/>
                                <x-text-input id="weight" name="weight" type="number" step="any" class="mt-1 block"
                                              autocomplete="new-password"/>
                            </div>

                            <div class="ml-3">
                                <x-input-label for="price" :value="__('price')"/>
                                <x-text-input id="price" name="price" type="number" step="any" class="mt-1 block"
                                              autocomplete="new-password"/>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="inline-flex">
                            <div class="ml-3">
                                <x-input-label for="category_id" :value="__('category')"/>
                                <x-text-input id="category_id" name="category_id" type="text" class="mt-1 block"
                                              autocomplete="new-password"/>
                            </div>

                            <div class="ml-3">
                                <x-input-label for="type_id" :value="__('type')"/>
                                <x-text-input id="type_id" name="type_id" type="text" class="mt-1 block"
                                              autocomplete="new-password"/>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="inline-flex">
                            <div class="ml-3">
                                <x-input-label for="brand_id" :value="__('brand')"/>
                                <x-text-input id="brand_id" name="brand_id" type="text" class="mt-1 block"
                                              autocomplete="new-password"/>
                            </div>

                            <div class="ml-3">
                                <x-input-label for="country_id" :value="__('country')"/>
                                <x-text-input id="country_id" name="country_id" type="text" class="mt-1 block"
                                              autocomplete="new-password"/>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 ml-3 mb-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
