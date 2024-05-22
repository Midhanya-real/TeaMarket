<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Addresses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="ml-3 mt-3 space-y-4 space-x-4">
                    <x-all-addresses :addresses="$addresses"></x-all-addresses>

                    <div class="flex items-center gap-4 ml-0 mb-4">
                        <x-primary-button>
                            <a href="{{route('profile.addresses.create')}}">
                                {{__('Create')}}
                            </a></x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
