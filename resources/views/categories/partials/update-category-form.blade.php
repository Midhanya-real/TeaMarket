<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="post" action="{{ route('admin.categories.update', $category)}}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')
                    <div class="ml-3">
                        <x-input-label for="category" :value="__('Name')"/>
                        <x-text-input id="category" name="name" type="text" class="mt-1 block"
                                      autocomplete="new-password" :value="old('name', $category->name)"/>
                    </div>
                    <div class="flex items-center gap-4 ml-3">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
