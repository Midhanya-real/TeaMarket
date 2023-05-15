<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <x-all-categories :categories="$categories"></x-all-categories>

                <div class="flex items-center gap-4 ml-3 mb-4">
                    <x-primary-button>
                        <a href="{{route('categories.create')}}">
                            {{__('Create')}}
                        </a>
                    </x-primary-button>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
